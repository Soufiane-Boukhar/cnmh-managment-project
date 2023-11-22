<?php

namespace App\Imports;

use App\Models\Project;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow; 

class ImportProject implements ToModel, WithHeadingRow 
{
    public function model(array $row)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'description' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ];

        $validator = \Validator::make($row, $rules);

        if ($validator->fails()) {
            return null;
        }

        return new Projet([
            'name' => $row['name'], 
            'description' => $row['description'],
            'start_date' => $row['start_date'],
            'end_date' => $row['end_date'],
        ]);
    }


}
