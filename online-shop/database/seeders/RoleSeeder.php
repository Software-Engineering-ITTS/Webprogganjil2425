<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run()
    {
        // Buat role admin
        Role::create(['name' => 'admin']);
        // Buat role customer
        Role::create(['name' => 'customer']);
    }
}

