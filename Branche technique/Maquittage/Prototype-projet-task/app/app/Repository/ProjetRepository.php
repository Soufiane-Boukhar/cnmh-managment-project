<?php

namespace App\Repository;

use App\Models\Projet;
use App\Models\User;

use App\Repository\BaseRepository;

class ProjetRepository extends BaseRepository
{
    public function __construct(Projet $model)
    {
        $this->model = $model;
    }

    
    protected $fieldProjet = [
        'nom',
        'description',
        'date_debut',
        'date_fin',
        'id_user',
    ];

    public function getFieldData(): array
    {
        return $this->fieldProjet;
    }

    public function model(): string
    {
        return Projet::class;
    }

}