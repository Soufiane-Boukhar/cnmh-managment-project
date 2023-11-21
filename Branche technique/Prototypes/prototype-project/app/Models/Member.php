<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Member extends User {
    use HasFactory;

    protected $table = 'users'; 

    protected $fillable = ['name', 'email', 'role', 'password']; 

}
