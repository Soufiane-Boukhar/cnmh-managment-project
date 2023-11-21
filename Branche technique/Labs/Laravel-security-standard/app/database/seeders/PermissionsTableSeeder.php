<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        Permission::create(['name' => 'create projects']);
        Permission::create(['name' => 'show projects']);
        Permission::create(['name' => 'edit projects']);
        Permission::create(['name' => 'update projects']);
        Permission::create(['name' => 'delete projects']);
    }
}
