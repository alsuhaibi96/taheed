<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User; 
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       // Create user
       $admin = User::create([
        'name' => 'Admin User',
        'email' => 'admin@admin.com',
        'role' => 'admin',
        'password' => Hash::make('password'), 
        'mobile' => '1234567890',
        'national_id' => '1234567890',
        'number_of_motorcycles' => 1,
        'otp_validation' => true
    ]);

    // Retrieve or create the Admin role
    $adminRole = Role::firstOrCreate(['name' => 'admin']);
    
    // Assign role to user
    $admin->assignRole($adminRole);
    }
}
