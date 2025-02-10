<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MarcaController extends Controller
{
    public function index () {
        $marcas = [
            "Ducado",
            "Camel",
            "Chesterfield",
            "Marlboro"
        ];
        
        return view("marcas", ["marcas" => $marcas]);
    }
}
