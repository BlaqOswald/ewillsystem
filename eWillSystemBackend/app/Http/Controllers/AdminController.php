<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $business = Business::orderBy("id", "DESC")->get();
        return view("users.index", ["businesses" => $business]);
    }
    public function store(Request $request)
    {
        if ($request->ajax()) {
            $request->validate([
                "business" => "required",
                "full_name" => "required",
                "contact" => "required",
                "email" => "required",
            ]);
            $business = $request->business;
            $check = Role::where("name", "Administrator")
                ->where("business", $business)
                ->first();
            if ($check) {
                $User = User::create([
                    "business" => $request->business,
                    "full_name" => $request->full_name,
                    "contact" => $request->contact,
                    "email" => $request->email,
                    "username" => $request->username,
                    "password" => Hash::make("admin"),
                    "role" => $check->id,
                    "addedby" => Auth::id(),
                ]);
            } else {
                $role = Role::create([
                    "business" => $business,
                    "name" => "Administrator",
                    "addedby" => Auth::user()->id,
                    "addedon" => date("Y-m-d"),
                ]);
                $User = User::create([
                    "business" => $request->business,
                    "full_name" => $request->full_name,
                    "contact" => $request->contact,
                    "email" => $request->email,
                    "username" => $request->username,
                    "password" => Hash::make("admin"),
                    "role" => $role->id,
                    "addedby" => Auth::id(),
                ]);
                $permission = Permission::create([
                    "business" => $request->business,
                    "role" => $role->id,
                    "view_dashboard" => 1,
                    "view_patients" => 1,
                    "new_patient" => 1,
                    "patient_triage" => 1,
                    "patient_visits" => 1,
                    "patient_view" => 1,
                    "patient_appointments" => 1,
                    "view_doctor" => 1,
                    "consultation_patients" => 1,
                    "procedure_patients" => 1,
                    "dental_patients" => 1,
                    "antenatal_patients" => 1,
                    "radiology_patients" => 1,
                    "other_patients" => 1,
                    "dischargepatient" => 1,
                    "referpatient" => 1,
                    "view_radiography" => 1,
                    "pick_tests_samples" => 1,
                    "enter_test_results" => 1,
                    "test_results_report" => 1,
                    "view_finance" => 1,
                    "patient_payments" => 1,
                    "patient_debts" => 1,
                    "insurance_patients" => 1,
                    "saving_scheme" => 1,
                    "view_expenses" => 1,
                    "view_pharmacy" => 1,
                    "dispense_medicine" => 1,
                    "sell_medicine" => 1,
                    "add_stock" => 1,
                    "stock_levels" => 1,
                    "view_reports" => 1,
                    "view_settings" => 1,
                    "veiw_permissions" => 1,
                    "addedby" => Auth::id(),
                ]);
            }
            return response($User);
        }
        // Audit Log
        Audit::create([
            "activity" => "registered new admin",
            "addedon" => now(),
            "user" => $user->id,
        ]);
    }

    public function checkusername(Request $request, User $user)
    {
        $check = User::where("username", $request->username)->first();
        if ($check) {
            return 1;
        } else {
            return 0;
        }
    }

    public function show(User $User)
    {
        $user = User::join("businesses", "users.business", "=", "businesses.id")
            ->join("roles", "users.role", "=", "roles.id")
            ->where("roles.name", "=", "Administrator")
            ->orderBy("users.id", "DESC")
            ->select(
                "users.*",
                "businesses.name as bzname",
                "businesses.id as bzid"
            )
            ->get();
        return view("users.show", ["users" => $user]);
    }
    public function update(Request $request, User $User)
    {
        if ($request->ajax()) {
            $User = User::find($request->id);
            $User->update([
                "business" => $request->business,
                "full_name" => $request->full_name,
                "contact" => $request->contact,
                "email" => $request->email,
            ]);
            return response($User);
        }
    }
    public function destroy(Request $request)
    {
        $item = User::find($request->id);
        $item->status = 0;
        $item->save();
        return response($item);
    }
    public function activate(Request $request)
    {
        $item = User::find($request->id);
        $item->status = 1;
        $item->save();
        return response($item);
    }
}
