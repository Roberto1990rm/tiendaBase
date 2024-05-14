<?php

namespace App\Http\Controllers;

use App\Models\Articulo; 
use Illuminate\Http\Request;

class ArticuloController extends Controller
{public function index()
    {
        $articulos = Articulo::all();
        //dd($articulos); // Esto detendrá la ejecución y mostrará los datos de los artículos en el navegador.
        return view('articulos', compact('articulos'));
    }
    



public function create()
{
    return view('articulos.create');
}

public function store(Request $request)
{
    $validatedData = $request->validate([
        'nombre' => 'required|max:255',
        'precio' => 'required|numeric',
        'unidades' => 'required|integer',
        'imagen' => 'nullable|url'
    ]);

    $articulo = new Articulo();
    $articulo->nombre = $validatedData['nombre'];
    $articulo->precio = $validatedData['precio'];
    $articulo->unidades = $validatedData['unidades'];
    $articulo->imagen = $validatedData['imagen'];
    $articulo->save();

    return redirect('/articulos')->with('success', 'Artículo guardado exitosamente');
}



}