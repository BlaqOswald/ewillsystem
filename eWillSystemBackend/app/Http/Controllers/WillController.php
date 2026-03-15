<?php

namespace App\Http\Controllers;

use App\Models\BurialDetial;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Audit;
use App\Models\Child;
use Illuminate\Support\Facades\Auth;
//use Barryvdh\DomPDF\Facade as PDF;
use PDF;

class WillController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view("wills.index", compact("users"));
    }

    public function show()
    {
        return view("wills.show", [
            "users" => User::orderBy("id", "DESC")->get(),
        ]);
    }

    public function view($id)
    {
        // Block access if the user is deactivated
        if ($user->status == 0) {
            return response()->json(
                [
                    "message" =>
                        "Your account is deactivated. Please contact support.",
                ],
                403
            );
        }
        $user = User::with(
            "rchildren",
            "rdependant",
            "rguardian",
            "rrelatives",
            "rcreditor",
            "rdebtor",
            "rexecutors",
            "rwitnesses",
            "rburialdetails",
            "rland",
            "rhouse",
            "rlivestock",
            "rbankaccounts",
            "rvehicle",
            "rshare",
            "rotherproperty"
        )->find($id);
        return view("wills.print", compact("user"));

        // Get the authenticated user
        $user = Auth::user();
        // Audit Log
        Audit::create([
            "activity" => "Printed will",
            "addedon" => now(),
            "user" => $user->id,
        ]);
    }

    public function filteredWills(Request $request)
    {
        $startDate = $request->input("start_date");
        $endDate = $request->input("end_date");

        // Validate the dates
        if (!$startDate || !$endDate) {
            return response()->json(["message" => "Invalid date range."], 400);
        }

        // Retrieve filtered data
        $users = User::whereBetween("created_at", [$startDate, $endDate])
            ->orderBy("created_at", "desc")
            ->get();

        // Return a partial view with filtered results
        return view("wills.filter", compact("users"))->render();
    }

    public function downloadWill($id)
    {
        // Block access if the user is deactivated
        if ($user->status == 0) {
            return response()->json(
                [
                    "message" =>
                        "Your account is deactivated. Please contact support.",
                ],
                403
            );
        }
        $user = User::findOrFail($id);

        if (!$user->will) {
            abort(404, "Will not found");
        }
    }

    public function print($id)
    {
        // Block access if the user is deactivated
        if ($user->status == 0) {
            return response()->json(
                [
                    "message" =>
                        "Your account is deactivated. Please contact support.",
                ],
                403
            );
        }
        $users = $user = User::where("id", $id)->first();
    }
    public function generateWillPDF()
    {
        // Block access if the user is deactivated
        if ($user->status == 0) {
            return response()->json(
                [
                    "message" =>
                        "Your account is deactivated. Please contact support.",
                ],
                403
            );
        }
        $id = Auth::user()->id;
        $user = User::where("id", $id)->first();
        // $user = User::find(1); // Fetch user data
        $children = child::where("user_id", $user->id)->get(); // Fetch assets related to the user
        $burialdetails = BurialDetial::where("user_id", $user->id)->get(); // Fetch beneficiaries related to the user

        $data = [
            "user" => $user,
            "children" => $children,
            "burialdetails" => $burialdetails,
        ];

        // $pdf = PDF::loadView('wills.first', $data);

        // return $pdf->stream('final_will.pdf');
    }

    public function printUserData($userId)
    {
        // Block access if the user is deactivated
        if ($user->status == 0) {
            return response()->json(
                [
                    "message" =>
                        "Your account is deactivated. Please contact support.",
                ],
                403
            );
        }
        $user = User::with(
            "rchildren",
            "rdependant",
            "rguardian",
            "rcreditor",
            "rdebtor",
            "rburialdetail"
        )->find($userId);

        return view("downloads.print", compact("user"));
    }
    public function indexpdf()
    {
        // Block access if the user is deactivated
        if ($user->status == 0) {
            return response()->json(
                [
                    "message" =>
                        "Your account is deactivated. Please contact support.",
                ],
                403
            );
        }
        $users = User::all();
        return view("downloads.index", compact("users"));
    }

    /**
     * Deactivate User (Restrict Will Access)
     */
    public function deactivateUser($id)
    {
        $user = User::findOrFail($id);

        // Set status to inactive (0)
        $user->status = 0;
        $user->save();

        // Log Activity
        Audit::create([
            "activity" => "Deactivated user with ID: $id",
            "addedon" => now(),
            "user" => Auth::id(),
        ]);

        return response()->json(
            [
                "message" =>
                    "User account has been deactivated. They cannot access will functions.",
            ],
            200
        );
    }

    /**
     * Reactivate User (Restore Will Access)
     */
    public function reactivateUser($id)
    {
        $user = User::findOrFail($id);

        // Ensure user has paid before reactivation
        if ($user->pay_status == 0) {
            return response()->json(
                [
                    "message" =>
                        "User must complete payment before reactivation.",
                ],
                400
            );
        }

        // Set status to active (1)
        $user->status = 1;
        $user->save();

        // Log Activity
        Audit::create([
            "activity" => "Reactivated user with ID: $id",
            "addedon" => now(),
            "user" => Auth::id(),
        ]);

        return response()->json(
            [
                "message" => "User account has been reactivated.",
            ],
            200
        );
    }
}
