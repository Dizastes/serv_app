<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class createRoles extends Seeder
{
    public function run(): void
    {
        $roles = [
            ['name' => 'Admin', 'description' => 'Admin', 'code' => 'Admin', 'created_by' => '1'],
            ['name' => 'User', 'description' => 'User', 'code' => 'User', 'created_by' => '1'],
            ['name' => 'Guest', 'description' => 'Guest', 'code' => 'Guest', 'created_by' => '1']
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
