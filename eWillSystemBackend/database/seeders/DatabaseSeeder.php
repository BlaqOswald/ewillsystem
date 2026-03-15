<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Define permissions
        Permission::create(['name' => 'view payment status']);
        Permission::create(['name' => 'generate will']);
        Permission::create(['name' => 'manage users']);
        Permission::create(['name' => 'assign roles']);
        // Add more permissions as needed

        // Define roles and assign permissions
        $adminRole = Role::create(['name' => 'admin']);
        $cashierRole = Role::create(['name' => 'cashier']);

        $adminRole->givePermissionTo(['view payment status', 'generate will', 'manage users', 'assign roles']);
        $cashierRole->givePermissionTo(['view payment status']);

        // Assign the admin role to a user
        $admin = User::find(1); // Assuming User ID 1 is the main admin
        $admin->assignRole('admin');
    }
}
