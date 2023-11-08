<?php

namespace App\Repository;

use App\Repository\BaseRepository;
use App\Models\Task;

class TaskRepository extends BaseRepository{

    public function __construct(Task $model){
        $this->model = $model;
    }

    protected $fieldTask = [
        'titre',
        'description',
        'id_projet',
    ];

    public function getFieldData():array{
        return $this->fieldTask;
    }

    public function model():string{
        return Task::class;
    }
}