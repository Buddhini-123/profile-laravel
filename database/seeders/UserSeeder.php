<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'username' => 'Admin_one',
            'email' => 'admin@gmail.com',
            'role' => 'Admin',
            'status' => 'Active',
            'plan' => 'Basic',
            'action' => 'WinDon Technologies Pvt Ltd',
            'password' => bcrypt('123456'),
        ]);

        User::create([
            'name' => 'User',
            'username' => 'User_one',
            'email' => 'user@gmail.com',
            'role' => 'user',
            'status' => 'Active',
            'plan' => 'Basic',
            'action' => 'WinDon Technologies Pvt Ltd',
            'password' => bcrypt('Abc12345'),
        ]);
    }
}
