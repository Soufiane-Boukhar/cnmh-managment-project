<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
   
    public function run()
    {
        $now = \Carbon\Carbon::now();

        $task = Task::insert([
            [
                'titre' => 'Prototype',
                'description' => 'Utiliser prototype pour apprendre laravel',
                'id_projet' => '1',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'titre' => 'Conception de base donne',
                'description' => 'Utiliser conception pour creer la base de donne',
                'id_projet' => '1',
                'created_at' => $now,
                'updated_at' => $now,
            ],[
                'titre' => 'Maquittage',
                'description' => 'Utiliser figma pour maquitter ce application',
                'id_projet' => '1',
                'created_at' => $now,
                'updated_at' => $now,
            ],[
                'titre' => 'Outile de design',
                'description' => 'Utiliser photoshop',
                'id_projet' => '2',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            
        ]);
    }
}