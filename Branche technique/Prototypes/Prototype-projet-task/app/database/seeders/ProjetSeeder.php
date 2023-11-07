<?php

namespace Database\Seeders;

use App\Models\Projet;
use Illuminate\Database\Seeder;

class ProjetSeeder extends Seeder
{
   
    public function run()
    {
        $now = \Carbon\Carbon::now();

        $projet = Projet::insert([
            [
                'nom' => 'creer web site',
                'description' => 'Gestion bibiliotheque',
                'date_debut' => '2023-10-05',
                'date_fin' => '2023-10-10',
                'id_user' => '1',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nom' => 'Creer logiciel',
                'description' => 'Gestion hospital',
                'date_debut' => '2023-10-05',
                'date_fin' => '2023-10-10',
                'id_user' => '1',
                'created_at' => $now,
                'updated_at' => $now,
            ],[
                'nom' => 'Creer un logo',
                'description' => 'Logo pour un entreprise de logistique',
                'date_debut' => '2023-10-05',
                'date_fin' => '2023-10-10',
                'id_user' => '2',
                'created_at' => $now,
                'updated_at' => $now,
            ],[
                'nom' => 'Create web site',
                'description' => 'Ecommerce web site',
                'date_debut' => '2023-10-05',
                'date_fin' => '2023-10-10',
                'id_user' => '2',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            
        ]);
    }
}