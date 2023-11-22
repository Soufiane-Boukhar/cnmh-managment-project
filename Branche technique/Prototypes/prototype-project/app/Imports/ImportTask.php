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
            'name' => 'required|string|max:255',
            'description' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'project_id' => 'required',
        ];

        $validator = \Validator::make($row, $rules);

        if ($validator->fails()) {
            return null;
        }

        return new Task([
            'name' => $row['titre'], 
            'description' => $row['description'],
            'start_date' => $row['start_date'],
            'end_date' => $row['end_date'],
            'project_id' => $row['project_id'],

        ]);
    }


}
