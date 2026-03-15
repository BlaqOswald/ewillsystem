<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use App\Models\User;
use App\Models\Audit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminRoleController extends Controller
{
    // Display users grouped by roles
    public function showUsersWithRoles()
    {
        // if (!auth()->user()->can("view roles")) {
        //     return response()->json(["message" => "Unauthorized"], 403);
        // }
        $roles = Role::with("users")->orderBy("created_at", "DESC")->get();
        $allRoles = Role::all();
        $users = User::all();

        return view("admin.roles.index", compact("roles", "allRoles", "users"));
    }

    // Assign or update a user's role
    public function assignRole(Request $request)
    {
        $request->validate([
            "user_id" => "required|exists:users,id",
            "role" => "nullable|exists:roles,name", // Allow 'role' to be nullable
        ]);

        $user = User::findOrFail($request->user_id);

        // Update user's role
        $user->syncRoles([$request->role]);

        return response()->json([
            "success" => true,
            "message" => "User role updated successfully.",
        ]);
        // Get the authenticated user
        $user = Auth::user();
        // Audit Log
        Audit::create([
            "activity" => "Assigned role to user",
            "addedon" => now(),
            "user" => $user->id,
        ]);
    }

    public function storeRole(Request $request)
    {
        $request->validate(["name" => "required|unique:roles,name"]);
        $role = Role::create(["name" => $request->name]);

        // Get the authenticated user
        $user = Auth::user();
        // Audit Log
        Audit::create([
            "activity" => "Created a Role",
            "addedon" => now(),
            "user" => $user->id,
        ]);
        return response()->json([
            "message" => "Role created successfully",
            "role" => $role,
        ]);
    }

    public function updateRole(Request $request, $id)
    {
        $role = Role::findOrFail($id);
        $role->name = $request->role_name;
        $role->save();

        // Get the authenticated user
        $user = Auth::user();

        // Audit Log
        Audit::create([
            "activity" => "Updated a role",
            "addedon" => now(),
            "user" => $user->id,
        ]);
        return response()->json([
            "message" => "Role updated successfully",
            "role" => $role,
        ]);
    }

    public function deleteRole($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();

        // Get the authenticated user
        $user = Auth::user();

        // Audit Log
        Audit::create([
            "activity" => "Removed a role",
            "addedon" => now(),
            "user" => $user->id,
        ]);
        return response()->json(["message" => "Role deleted successfully"]);
    }
}
