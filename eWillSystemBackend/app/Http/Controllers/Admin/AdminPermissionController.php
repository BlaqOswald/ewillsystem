<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\Audit;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminPermissionController extends Controller
{
    // Display roles and permissions in a tabular view
    public function index()
    {
        $roles = Role::with("permissions")
            ->orderBy("created_at", "DESC")
            ->get();
        $permissions = Permission::all();

        return view("admin.permissions.index", compact("roles", "permissions"));
    }

    // Handle permission assignment
    public function assignPermissions(Request $request)
    {
        $request->validate([
            "role_id" => "required|exists:roles,id",
            "permission_id" => "required|exists:permissions,id",
            "value" => "required|boolean",
        ]);

        $role = Role::findById($request->role_id);
        $permission = Permission::findById($request->permission_id);

        if ($request->value) {
            // Assign permission
            $role->givePermissionTo($permission);
            // Get the authenticated user
            $user = Auth::user();
            // Audit Log
            Audit::create([
                "activity" => "Assigned a role a permission",
                "addedon" => now(),
                "user" => $user->id,
            ]);
        } else {
            // Revoke permission
            $role->revokePermissionTo($permission);
            // Get the authenticated user
            $user = Auth::user();
            // Audit Log
            Audit::create([
                "activity" => "Removed a role from a permission",
                "addedon" => now(),
                "user" => $user->id,
            ]);
        }

        return response()->json([
            "message" => "Permission updated successfully.",
        ]);
    }

    // Add a new permission
    public function storePermission(Request $request)
    {
        $request->validate([
            "permission_name" => "required|string|unique:permissions,name",
        ]);

        $permission = Permission::create(["name" => $request->permission_name]);

        return response()->json([
            "success" => "Permission added successfully.",
            "permission" => $permission,
        ]);
        // Get the authenticated user
        $user = Auth::user();
        // Audit Log
        Audit::create([
            "activity" => "Added a new permission",
            "addedon" => now(),
            "user" => $user->id,
        ]);
    }

    /**
     * Delete a permission.
     */
    public function destroy($id)
    {
        // Check if permission exists
        $permission = Permission::find($id);

        if (!$permission) {
            return response()->json(
                [
                    "message" => "Permission not found.",
                ],
                404
            );
        }

        // Delete the permission
        $permission->delete();

        return response()->json(
            [
                "message" => "Permission deleted successfully.",
            ],
            200
        );
        // Get the authenticated user
        $user = Auth::user();
        // Audit Log
        Audit::create([
            "activity" => "Removed a permission",
            "addedon" => now(),
            "user" => $user->id,
        ]);
    }

    // Get permissions for a specific role
    public function getPermissionsByRole($roleId)
    {
        $role = Role::with("permissions")->findOrFail($roleId);

        // Format response
        $permissions = $role->permissions->map(function ($permission) {
            return [
                "id" => $permission->id,
                "name" => ucfirst($permission->name), // Capitalize permission name
                "assigned" => true, // Mark as assigned
            ];
        });

        return response()->json(["permissions" => $permissions], 200);
    }
}
