<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;


class Projet extends Model
{
    use HasFactory;
    protected $fillable = ['nom','description','date_debut','date_fin','id_user'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

}
