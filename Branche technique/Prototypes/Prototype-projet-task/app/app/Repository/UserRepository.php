<?php

namespace App\Repository;

use App\Models\User;
use App\Repository\BaseRepository;

class UserRepository extends BaseRepository{

    public function __construct(User $model){
       $this->model = $model;
    }

    protected $fieldUser = [
        'nom',
        'prenom',
        'email',
        'password',
    ];

    public function getFieldData():array{
        return $this->fieldUser;
    }

    public function model():string{
        return User::class;
    }
}