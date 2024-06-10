<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class createPermissions extends Seeder
{
    public function run(): void
    {
        $permissions = [
            ['name' => 'get-list-user', 'description' => 'can get list of users', 'code' => 'get-list-user', 'created_by' => '1'],
            ['name' => 'read-user', 'description' => 'can read user', 'code' => 'read-user', 'created_by' => '1'],
            ['name' => 'create-user', 'description' => 'can create user', 'code' => 'create-user', 'created_by' => '1'],
            ['name' => 'update-user', 'description' => 'can update user', 'code' => 'update-user', 'created_by' => '1'],
            ['name' => 'delete-user', 'description' => 'can delete user', 'code' => 'delete-user', 'created_by' => '1'],
            ['name' => 'restore-user', 'description' => 'can restore user', 'code' => 'restore-user', 'created_by' => '1'],


            ['name' => 'get-list-role', 'description' => 'can get list of roles', 'code' => 'get-list-role', 'created_by' => '1'],
            ['name' => 'read-role', 'description' => 'can read role', 'code' => 'read-role', 'created_by' => '1'],
            ['name' => 'create-role', 'description' => 'can create role', 'code' => 'create-role', 'created_by' => '1'],
            ['name' => 'update-role', 'description' => 'can update role', 'code' => 'update-role', 'created_by' => '1'],
            ['name' => 'delete-role', 'description' => 'can delete role', 'code' => 'delete-role', 'created_by' => '1'],
            ['name' => 'restore-role', 'description' => 'can restore deleted role', 'code' => 'restore-role', 'created_by' => '1'],

            ['name' => 'get-list-permission', 'description' => 'can get list of permissions', 'code' => 'get-list-permission', 'created_by' => '1'],
            ['name' => 'read-permission', 'description' => 'can read permission', 'code' => 'read-permission', 'created_by' => '1'],
            ['name' => 'create-permission', 'description' => 'can create permission', 'code' => 'create-permission', 'created_by' => '1'],
            ['name' => 'update-permission', 'description' => 'can update permission', 'code' => 'update-permission', 'created_by' => '1'],
            ['name' => 'delete-permission', 'description' => 'can delete permission', 'code' => 'delete-permission', 'created_by' => '1'],
            ['name' => 'restore-permission', 'description' => 'can restore permission', 'code' => 'restore-permission', 'created_by' => '1'],
        ];

        foreach ($permissions as $permission) {
            Permission::create($permission);
        }
    }
}
