<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create roles
        $adminRole = Role::create([
            'name' => 'admin',
            'description' => 'Administrator dengan akses penuh',
        ]);

        $userRole = Role::create([
            'name' => 'user',
            'description' => 'User biasa dengan akses terbatas',
        ]);

        // Create admin user
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@automotive.com',
            'password' => Hash::make('admin123'),
            'role_id' => $adminRole->id,
        ]);

        // Create regular user
        User::create([
            'name' => 'User Test',
            'email' => 'user@automotive.com',
            'password' => Hash::make('user123'),
            'role_id' => $userRole->id,
        ]);
    }
}
