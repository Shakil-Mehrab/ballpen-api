<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::factory()->create([
            'name' => 'Super Admin',
            'display_name' => 'Admin',
            'phone_number' => '01615336636',
            'email' => 'mehrabhoussainshakil4@gmail.com',
            'bio' => 'Shakil is a developer',
            'password' => Hash::make('password'),
            'is_admin' => true,
        ]);
        $user = User::factory()->create([
            'name' => 'User',
            'display_name' => 'User',
            'phone_number' => '01615336636',
            'email' => 'mehrabhoussainshakil12@gmail.com',
            'bio' => 'Shakil is a developer',
            'password' => Hash::make('password'),
            'is_admin' => true,
        ]);
    }
}
