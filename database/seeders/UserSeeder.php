<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Admin Grafika',
            'email' => 'admin@grafika.com',
            'password' => bcrypt('password')
        ]);
        $admin->assignRole('admin');

        $owner = User::create([
            'name' => 'Owner Grafika',
            'email' => 'owner@grafika.com',
            'password' => bcrypt('password')
        ]);
        $owner->assignRole('owner');
    }
}
