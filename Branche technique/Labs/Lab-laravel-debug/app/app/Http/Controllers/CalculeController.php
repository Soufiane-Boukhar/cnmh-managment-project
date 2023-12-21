<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculeController extends Controller
{
    public function somme(){
        $x = 10;
        $y = 10;
        $result = $this->addition($x,$y);
    }

    public function addition($x,$y){

        return $x - $y;

    }
}
