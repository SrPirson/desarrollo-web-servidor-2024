<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Marca;

class MarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /* $marcas = [
            "Mazda",
            "Mercedes-Benza",
            "MG",
            "Tesla",
            "Chrysler",
            "Xiaomi",
        ]; */

        $marcas = Marca::all(); // Para recoger todas las marcas y lo guarda como array en la variable marcas

        return view("marcas/index", ["marcas" => $marcas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Creamos la pagina para crear una nueva marca
        return view("marcas/create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Aqui mandamos la información del formulario a la BBDD
        $marca = new Marca;
        $marca -> marca = $request -> input("marca"); // marca es el del formulario
        $marca -> ano_fundacion = $request -> input("ano_fundacion"); // año de fundación es el del formulario
        $marca -> pais = $request -> input("pais");
        $marca -> save(); // esto crea el objeto

        return redirect("/marcas"); // Para cuando se inserte nos mande al index
    }

    /**
     * Mostrar recursos especificados
     */
    public function show(string $id)
    {
        $marca = Marca::find($id);

        return view("marcas/show",["marca" => $marca]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
