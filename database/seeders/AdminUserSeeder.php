<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ensure the Administrator role exists for the foreign key constraint
        $adminRole = Role::firstOrCreate(
            ['role_name' => 'Administrator'],
            ['description' => 'System Administrator with full system control and privileges.']
        );

        // Create or update the default administrator account
        User::updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'System Administrator',
                'password' => Hash::make('password123'),
                'role_id' => $adminRole->id,
                'email_verified_at' => now(),
            ]
        );
    }
}
