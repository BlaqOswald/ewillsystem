<?php

namespace App\Http\Controllers;

use App\Models\Business;
use Spatie\Permission\Models\Role;
use App\Models\User;
use App\Models\SystemAdmin;
use App\Models\Audit;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Helpers\MailHelper;

class ProfileController extends Controller
{
    // Display the user profile and list of users
    public function index()
    {
        $user = Auth::user(); // Get the authenticated user
        return view("profile.index", [
            "user" => $user,
        ]); // Pass everything to the view
    }

    public function business()
    {
        $details = Business::all();
        return view("businessProfile.index", [
            "details" => $details,
        ]); // Pass everything to the view
    }
    public function showbusiness()
    {
        $details = Business::all();
        // Return success response
        return response()->json(
            [
                "details" => $details,
            ],
            200
        );
    }
    // Update business information
    public function update(Request $request)
    {
        // Validate request data
        $request->validate([
            "id" => "required|integer|exists:businesses,id",
            "name" => "required|string|max:255",
            "email" => "required|email|max:255",
            "website" => "nullable|string|max:255",
            "contact" => "required|string|max:15",
            "address" => "nullable|string|max:255",
        ]);

        // Find business record
        $business = Business::findOrFail($request->id);

        // Update business details
        $business->update([
            "name" => $request->name,
            "email" => $request->email,
            "website" => $request->website,
            "contact" => $request->contact,
            "address" => $request->address,
        ]);

        // Return success response
        return response()->json(
            [
                "message" => "Business details updated successfully!",
                "business" => $business,
            ],
            200
        );
    }

    public function admins()
    {
        $usersWithRolesAndPermissions = User::where("user_type", 1)->get(); // Adjust the role as needed
        $allRoles = Role::all();
        return view(
            "systemAdmins.index",
            compact("usersWithRolesAndPermissions", "allRoles")
        ); // Pass everything to the view
    }

    public function checkEmail(Request $request)
    {
        $request->validate(["email" => "required|email"]);

        $exists = User::where("email", $request->email)->exists();

        return response()->json(["exists" => $exists]);
    }

    public function register(Request $request)
    {
        try {
            // Step 1: Validate input
            $request->validate([
                "first_name" => "required|string|max:255",
                "last_name" => "required|string|max:255",
                "username" => "required|string|max:255|unique:users,username",
                "email" => "required|email|unique:users,email",
                "contact" => "required|string|max:15",
                "nin" => "nullable|string|max:20",
                "current_address" => "nullable|string|max:255",
                "original_address" => "nullable|string|max:255",
                "gender" => "required|string",
                "marital_status" => "required|string",
                "role" => "required|string|exists:roles,name",
            ]);

            // Step 2: Generate a unique will_id
            $latestUser = User::latest("id")->first();
            $date = date("ymd");
            $newpid =
                $latestUser && substr($latestUser->will_id, 0, 6) == $date
                    ? substr($latestUser->will_id, 6) + 1
                    : 1;
            $will_id = $date . str_pad($newpid, 3, "0", STR_PAD_LEFT);

            // Step 3: Generate a random default password
            $defaultPassword = substr(
                str_shuffle(
                    "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"
                ),
                0,
                8
            );
            // Set user_type to admin (1)

            $user = User::create([
                "will_id" => $will_id,
                "first_name" => $request->first_name,
                "last_name" => $request->last_name,
                "username" => $request->username,
                "contact" => $request->contact,
                "email" => $request->email,
                "password" => Hash::make($defaultPassword), // Store hashed password
                "current_address" => $request->current_address,
                "original_address" => $request->original_address,
                "gender" => $request->gender,
                "marital_status" => $request->marital_status,
            ]);
            $user->user_type = 1;
            $user->save();

            // Assign role using Spatie
            $user->assignRole($request->role);

            // Step 5: Log registration in Audit table
            Audit::create([
                "activity" => "New User Registered",
                "addedon" => now()->format("Y-m-d"),
                "user" => $user->id,
            ]);

            // Step 6: Prepare Mail Data
            $data = [
                "full_name" => $user->first_name . " " . $user->last_name,
                "default_password" => $defaultPassword, // Use plaintext password for email
            ];

            // Step 7: Send Mail
            $emailSent = MailHelper::sendMail($user->email, "register", $data);

            // Step 8: Return success response
            return response()->json(
                [
                    "message" =>
                        "Registration successful. Check your email for login details.",
                    "email" => $user->email,
                    "default_password" => $defaultPassword, // Include the default password
                ],
                200
            );
        } catch (\Exception $e) {
            return response()->json(
                [
                    "message" => "Registration failed.",
                    "error" => $e->getMessage(),
                ],
                500
            );
        }
    }

    public function updateAdminProfile(Request $request)
    {
        // Validate Input Data
        $request->validate([
            "id" => "required|integer|exists:users,id",
            "first_name" => "required|string|max:255",
            "last_name" => "required|string|max:255",
            "username" => "required|string|max:255",
            "date_of_birth" => "required|date",
            "contact" => "required|string|max:15",
            "nin" => "nullable|string|max:20",
            "current_address" => "nullable|string|max:255",
        ]);

        // Find the User
        $user = User::findOrFail($request->id);

        // Update User Details
        $user->update([
            "first_name" => $request->first_name,
            "last_name" => $request->last_name,
            "username" => $request->username,
            "date_of_birth" => $request->date_of_birth,
            "contact" => $request->contact,
            "nin" => $request->nin,
            "current_address" => $request->current_address,
        ]);

        // Return Success Response
        return response()->json(
            [
                "message" => "User details updated successfully!",
                "user" => $user,
            ],
            200
        );
    }
}
