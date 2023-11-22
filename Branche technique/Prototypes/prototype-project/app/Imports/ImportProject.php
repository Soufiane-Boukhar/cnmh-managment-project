<?php

namespace App\Imports;

use App\Models\Projet;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow; 

class ImportProjet implements ToModel, WithHeadingRow 
{
    public function model(array $row)
    {
        $rules = [
            'description' => 'required|string|max:255',
            'date_debut' => 'required',
            'date_fin' => 'required',
            'id_user' => 'required',
        ];

        $validator = \Validator::make($row, $rules);

        if ($validator->fails()) {
            return null;
        }

        return new Projet([
            'nom' => $row['nom'], 
            'description' => $row['description'],
            'date_debut' => $row['date_debut'],
            'date_fin' => $row['date_fin'],
            'id_user' => $row['id_user'],
        ]);
    }


}
