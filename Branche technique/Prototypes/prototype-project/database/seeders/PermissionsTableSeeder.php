<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        Permission::create(['name' => 'create-ProjectController']);
        Permission::create(['name' => 'show-ProjectController']);
        Permission::create(['name' => 'edit-ProjectController']);
        Permission::create(['name' => 'update-ProjectController']);
        Permission::create(['name' => 'destroy-ProjectController']);
        Permission::create(['name' => 'index-ProjectController']);
        Permission::create(['name' => 'import-ProjectController']);
        Permission::create(['name' => 'export-ProjectController']);


        Permission::create(['name' => 'create-TaskController']);
        Permission::create(['name' => 'show-TaskController']);
        Permission::create(['name' => 'edit-TaskController']);
        Permission::create(['name' => 'update-TaskController']);
        Permission::create(['name' => 'destroy-TaskController']);
        Permission::create(['name' => 'index-TaskController']);
        Permission::create(['name' => 'import-TaskController']);
        Permission::create(['name' => 'export-TaskController']);


        Permission::create(['name' => 'create-MemberController']);
        Permission::create(['name' => 'show-MemberController']);
        Permission::create(['name' => 'edit-MemberController']);
        Permission::create(['name' => 'update-MemberController']);
        Permission::create(['name' => 'destroy-MemberController']);
        Permission::create(['name' => 'index-MemberController']);

    }
}
