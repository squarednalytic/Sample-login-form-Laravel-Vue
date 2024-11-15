<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Role;
use App\Models\Permission;
use App\Models\AuditTrail;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Seed Roles
        $adminRole = Role::create([
            'name' => 'admin',
            'description' => 'Administrator with full access'
        ]);
        
        $userRole = Role::create([
            'name' => 'user',
            'description' => 'Regular user with limited access'
        ]);

        // Seed Permissions
        $viewDashboardPermission = Permission::create([
            'name' => 'view_dashboard',
            'description' => 'Permission to view the dashboard'
        ]);

        $manageUsersPermission = Permission::create([
            'name' => 'manage_users',
            'description' => 'Permission to manage users'
        ]);

        // Assign permissions to roles
        $adminRole->permissions()->attach([$viewDashboardPermission->id, $manageUsersPermission->id]);
        $userRole->permissions()->attach([$viewDashboardPermission->id]);

        // Seed Users
        $admin = User::create([
            'name' => 'Administrator',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'), // Password should be hashed
        ]);
        $admin->roles()->attach($adminRole);

        $user = User::create([
            'name' => 'Hr',
            'email' => 'Hr@example.com',
            'password' => bcrypt('password'),
        ]);
        $user->roles()->attach($userRole);

        // Seed Audit Trails
        AuditTrail::create([
            'user_id' => $admin->id,
            'username' => $admin->name,
            'menu_accessed' => 'Dashboard',
            'method' => 'GET',
            'timestamp' => now(),
        ]);

        AuditTrail::create([
            'user_id' => $user->id,
            'username' => $user->name,
            'menu_accessed' => 'Dashboard',
            'method' => 'GET',
            'timestamp' => now(),
        ]);
    }
}
