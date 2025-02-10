<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CocheController extends Controller
{
    public function index () {
        $coches = [
            ["Mazda", "RX7", 9.99],
            ["Mercedes-Benz", "CLA", 99999.99],
            ["Ford", "Focus", 59.99],
            ["Citroën", "C15", 19.99],
            ["Mitsubichi", "Pajero", 7.99],
        ];
        
        return view("coches", ["coches" => $coches]);
    }
}