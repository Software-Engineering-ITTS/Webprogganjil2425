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
        $userdata = [
            [
                'username' => 'Admin',
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'role' => 'admin',
                'password' => bcrypt('12345'),
            ],
            [
                'username' => 'ryan',
                'name' => 'ryan',
                'email' => 'ryan@gmail.com',
                'role' => 'user',
                'password' => bcrypt('12345'),
            ]
        ];

        foreach($userdata as $key => $val){
            User::create($val);
        }
    }
}
