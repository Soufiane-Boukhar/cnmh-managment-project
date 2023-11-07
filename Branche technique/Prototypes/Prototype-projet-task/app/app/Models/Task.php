<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Projet;


class Task extends Model
{
    use HasFactory;
    
    protected $table = 'tasks';

    protected $fillable = ['titre','description','id_projet'];
    
    public function projet()
    {
        return $this->belongsTo(Projet::class, 'id_projet');
    }

    

    
}
