<?php

namespace App\Repository;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

abstract class BaseRepository
{
    protected $model;

    public function __construct()
    {
        $this->model = $this->model();
    }

    abstract public function getFieldData(): array;
    abstract public function model(): string;


    public function create(array $data)
    {
        $fillableData = collect($data)->only($this->getFieldData())->all();
        $this->model->create($fillableData);
    }

   
    public function getAllWithUser($perPage = 5)
    {
        return $this->model
            ->join('users', 'projets.id_user', '=', 'users.id')
            ->select('projets.*', 'users.nom AS nom_user','users.prenom')
            ->paginate($perPage);
    }

    public function find($id){
        return $this->model->find($id);
    }

    public function findTask($id, $perPage = 5) {
        return $this->model->where('id_projet', $id)->paginate($perPage);
    }

    public function update(array $data, $id)
    {
        $task = $this->model->find($id);

        if (!$task) {
            return false; 
        }

        $fillableData = collect($data)->only($this->getFieldData())->all();

        return $task->update($fillableData);
    }

    public function delete($id){
        $task = $this->model->find($id);
    
        if (!$task) {
            return false;
        }
    
        return $this->model->destroy($id);
    }


    public function search($search, $perPage = 5)
    {
        $searchQuery = $search;
    
        $results = $this->model
            ->join('users', 'projets.id_user', '=', 'users.id')
            ->select('projets.*', 'users.nom AS nom_user', 'users.prenom')
            ->where(function ($query) use ($searchQuery) {
                $query->where('projets.nom', 'like', '%' . $searchQuery . '%')
                    ->orWhere('projets.description', 'like', '%' . $searchQuery . '%')
                    ->orWhere('users.nom', 'like', '%' . $searchQuery . '%')
                    ->orWhere('users.prenom', 'like', '%' . $searchQuery . '%');
            })
            ->paginate($perPage);
    
        return $results;
    }

    public function searchTask($search, $perPage = 5)
    {
        $searchQuery = $search;

        $results = $this->model->where('titre', 'like', '%' . $searchQuery . '%')
            ->orWhere('description', 'like', '%' . $searchQuery . '%')
            ->paginate($perPage);
        return $results;
    }
    

 
}