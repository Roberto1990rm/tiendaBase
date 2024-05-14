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
        'imagen' => 'nullable|image|max:2048', // Asegúrate de validar que es una imagen y limita su tamaño
    ]);

    $articulo = new Articulo($validatedData);

    if ($request->hasFile('imagen') && $request->file('imagen')->isValid()) {
        $imageName = time() . '.' . $request->imagen->extension();
        $request->imagen->move(public_path('images'), $imageName);
        $articulo->imagen = $imageName; // Guardar el nombre de la imagen en la base de datos
    }

    $articulo->save();

    return redirect('/articulos')->with('success', 'Artículo guardado exitosamente');
}



}