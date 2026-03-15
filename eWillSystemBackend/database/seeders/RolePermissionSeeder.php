<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run()
    {
        // Define permissions to create
        $permissions = [
            'manage users',
            'manage content',
            'view finance',
            'assign roles',
            'manage invoices',
            'create overall admin',
        ];

        // Create permissions if they don't exist
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Create roles and assign permissions
        $overallAdmin = Role::firstOrCreate(['name' => 'Overall Admin']);
        $overallAdmin->givePermissionTo(Permission::all());

        $contentManager = Role::firstOrCreate(['name' => 'Content Manager']);
        $contentManager->givePermissionTo(['manage content']);

        $userManager = Role::firstOrCreate(['name' => 'User Manager']);
        $userManager->givePermissionTo(['manage users']);

        $financeAdmin = Role::firstOrCreate(['name' => 'Finance Admin']);
        $financeAdmin->givePermissionTo(['view finance', 'manage invoices']);
    }
}
