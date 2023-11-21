<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use App\Models\User; 

class UserTableSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'created_at' => now(),
            'updated_at' => now()
        ])->assignRole('admin');

        User::create([
            'name' => 'Ahmed Alami',
            'email' => 'ahmed@gmail.com',
            'password' => Hash::make('aaa1998.'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        User::create([
            'name' => 'Karim kamari',
            'email' => 'karim@gmail.com',
            'password' => Hash::make('aaa1998.'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        User::create([
            'name' => 'Soufiane Boukhar',
            'email' => 'soufiane@gmail.com',
            'password' => Hash::make('aaa1998.'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
