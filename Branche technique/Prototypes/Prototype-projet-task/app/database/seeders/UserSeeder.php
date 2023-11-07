<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
   
    public function run()
    {
        $now = \Carbon\Carbon::now();
        $password = Hash::make('aaa1998.');

        $user = User::insert([
            [
                'nom' => 'Boukhar',
                'prenom' => 'Soufiane',
                'email' => 'boukhar.soufiane.solicode@gmail.com',
                'password' => $password,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nom' => 'Amine',
                'prenom' => 'Kamari',
                'email' => 'amine@gmail.com',
                'password' => $password,
                'created_at' => $now,
                'updated_at' => $now,
            ],[
                'nom' => 'Anas',
                'prenom' => 'Ben ali',
                'email' => 'anascode@gmail.com',
                'password' => $password,
                'created_at' => $now,
                'updated_at' => $now,
            ],[
                'nom' => 'Ahmed',
                'prenom' => 'Alami',
                'email' => 'ahmed@gmail.com',
                'password' => $password,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            
        ]);
    }
}