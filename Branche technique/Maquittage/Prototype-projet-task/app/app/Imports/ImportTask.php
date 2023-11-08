<?php

namespace App\Imports;

use App\Models\Task;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow; 

class ImportTask implements ToModel, WithHeadingRow 
{
    public function model(array $row)
    {
        $rules = [
            'titre' => 'required|string|max:255',
            'description' => 'required',
            'id_projet' => 'required',
        ];

        $validator = \Validator::make($row, $rules);

        if ($validator->fails()) {
            return null;
        }

        return new Task([
            'titre' => $row['titre'], 
            'description' => $row['description'],
            'id_projet' => $row['id_projet'],
        ]);
    }


}
