<?php

namespace App\Http\Controllers;

use App\Http\Resources\LicenseResource;
use App\Http\Resources\UserResource;
use App\Http\Resources\UsersResource;
use App\Models\Audit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use App\Helpers\MailHelper;

use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Routing\Controller;
use Illuminate\Http\Response;
use Illuminate\Contracts\Routing\ResponseFactory;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            "email" => ["required", "email", "max:255"],
            "password" => ["required", "string", "min:5"],
        ]);

        $user = User::where("email", $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(
                [
                    "message" => "The provided credentials are incorrect.",
                ],
                401
            );
        }

        if ($request->has('subscription_id') && !$user->sub_package_id) {
            // Assign subscription if user does not have one
            $user->sub_package_id = $request->subscription_id;
            $user->save();
        }

        // Revoke old tokens
        DB::table("personal_access_tokens")
            ->where("tokenable_id", $user->id)
            ->delete();

        // Create a new token
        $token = $user->createToken("my-app-token")->plainTextToken;

        // Audit Log
        Audit::create([
            "activity" => "Logged In",
            "addedon" => now(),
            "user" => $user->id,
        ]);

        return response()->json(
            [
                "user" => new UserResource($user),
                "token" => $token,
            ],
            200
        );
    }

    public function checkEmail(Request $request)
    {
        $request->validate(["email" => "required|email"]);

        $exists = User::where("email", $request->email)->exists();

        return response()->json(["exists" => $exists]);
    }

    public function view()
    {
        $user = Auth::user();

        return response()->json([
            "user" => new UsersResource($user),
        ]);
    }

    public function updatepass(Request $request)
    {
        $request->validate([
            "password" => "required|min:8",
        ]);

        $user = Auth::user();

        if ($user) {
            $user->password = Hash::make($request->password);
            $user->save();

            return response()->json([
                "message" => "Password updated successfully",
            ]);
        } else {
            return response()->json(["error" => "User not authenticated"], 401);
        }
    }

    public function passupdate(Request $request)
    {
        $request->validate([
            "current_password" => "required",
            "password" => "required|min:8",
        ]);

        $user = User::find(Auth::user()->id);

        // Check if the current password matches the one in the database
        if (!Hash::check($request->current_password, $user->password)) {
            return response()->json(
                ["error" => "Current password is incorrect"],
                422
            );
        }

        // Update the password
        $user->password = Hash::make($request->password);
        $user->save();
        $audit = Audit::create([
            // 'business'=>$user->business,
            "activity" => "Changed Password",
            "addedon" => date("Y-m-d"),
            "user" => $user->id,
        ]);

        return response()->json(["message" => "Password updated successfully"]);
    }

    public function save(Request $request)
    {
        $item = User::find(Auth::user()->id);
        $item->first_name = $request->first_name;
        $item->last_name = $request->last_name;
        $item->contact = $request->contact;
        $item->email = $request->email;
        $item->username = $request->username;
        $item->gender = $request->gender;
        $item->nin = $request->nin;
        $item->date_of_birth = $request->date_of_birth;
        $item->original_address = $request->original_address;
        $item->current_address = $request->current_address;
        $item->marital_status = $request->marital_status;

        if ($request->hasFile("passport")) {
            $passportName =
                $item->first_name .
                $item->last_name .
                $item->date_of_birth .
                time() .
                "." .
                $request->passport->getClientOriginalExtension();
            $passportPath = $request->passport->move(
                public_path("passports"),
                $passportName
            );
            $item->passport = $passportName; // Save only the file name
        }

        if ($request->hasFile("nationalID")) {
            $nationalIDName =
                $item->first_name .
                $item->last_name .
                $item->date_of_birth .
                time() .
                "." .
                $request->nationalID->getClientOriginalExtension();
            $nationalIDPath = $request->nationalID->move(
                public_path("nationalIDs"),
                $nationalIDName
            );
            $item->update(["nationalID" => $nationalIDName]); // Save only the file name
        }
        $item->save();

        return response()->json([
            "message" => "Personal Data Saved",
            "code" => 200,
        ]);
    }

    public function destroy(Request $request)
    {
        $item = User::find($request->id);
        $item->status = 0;
        $item->save();
        $user = User::where("id", $request->id)->first();
    }

    public function register(Request $request)
    {
        $pwill_id = User::orderBy("id", "desc")->first();
        if ($pwill_id == null) {
            $count = 0;
        } else {
            $count = $pwill_id->count();
        }
        $date = date("ymd");

        if ($count > 0) {
            $pdate = substr($pwill_id->will_id, 0, 6);
            if ($date == $pdate) {
                $newpid = substr($pwill_id->will_id, 6);
            } else {
                $newpid = "0";
            }
        } else {
            $newpid = "0";
        }
        $will_id =
            date("ymd") . "" . str_pad($newpid + 1, 3, "0", STR_PAD_LEFT);

        // Generate a random default password
        $defaultPassword = substr(
            str_shuffle(
                "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"
            ),
            0,
            8
        );

        $user = User::create([
            "will_id" =>
                date("ymd") . str_pad(User::count() + 1, 3, "0", STR_PAD_LEFT),
            "first_name" => $request->first_name,
            "last_name" => $request->last_name,
            "contact" => $request->contact,
            "email" => $request->email,
            "password" => Hash::make($defaultPassword), // Store hashed password
            "current_address" => $request->current_address,
            "gender" => $request->gender,
        ]);

        $audit = Audit::create([
            // 'business'=>$user->business,
            "activity" => "New User Register",
            "addedon" => date("Y-m-d"),
            "user" => $user->id,
        ]);

        // Return email to frontend for further processing
        return response()->json(
            [
                "message" => "Registration successful.",
                "email" => $user->email,
                "default_password" => $defaultPassword, // Send plaintext password for email
            ],
            200
        );

        // Return success response
        return response()->json(["message" => "Registration successful."], 200);
    }

    public function sendPasswordEmail(Request $request)
    {
        // Step 1: Validate Input
        $request->validate([
            "email" => "required|email",
            "default_password" => "required|string", // Expect plaintext password from frontend
        ]);

        // Step 2: Fetch User
        $user = User::where("email", $request->email)->first();

        if (!$user) {
            return response()->json(["message" => "User not found."], 404);
        }

        // Step 3: Prepare Mail Data
        $data = [
            "full_name" => $user->first_name . " " . $user->last_name,
            "default_password" => $request->default_password, // Use plaintext password from the request
        ];

        // Step 4: Send Mail
        $emailSent = MailHelper::sendMail($user->email, "register", $data);

        // Step 5: Return Response
        if ($emailSent) {
            return response()->json(
                ["message" => "Password email sent successfully."],
                200
            );
        } else {
            return response()->json(
                ["message" => "Failed to send email."],
                500
            );
        }
    }

    public function verifyNin (Request $request) {
        $willid = $request->input('willid');
        $nin = $request->input('nin');

        $user = User::where('will_id', $willid)->where('nin', $nin)->first();

        if ($user) {
            return response()->json([
                'status' => 'success',
                'message' => 'Verification successful',
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid Will ID or NIN',
            ], 400);
        }
    }
}
