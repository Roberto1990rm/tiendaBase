<?php

namespace App\Http\Controllers;

use App\Models\Articulo; 
use Illuminate\Http\Request;

class ArticuloController extends Controller
{   

    public function index()
    {
        $articulos = Articulo::all();
        //dd($articulos); // Esto detendrá la ejecución y mostrará los datos de los artículos en el navegador.
        return view('articulos', compact('articulos'));
    }
    

    public function show($id)
    {
        $articulo = Articulo::findOrFail($id);
        return view('articulos.show', compact('articulo'));
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
        'imagen' => 'nullable|image|max:2048', 
        'descripcion' => 'nullable|string',
        'estado' => 'required|string'
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


public function buscar(Request $request)
{
    $query = $request->input('query');
    $articulos = Articulo::where('nombre', 'LIKE', "%{$query}%")
                         //->orWhere('descripcion', 'LIKE', "%{$query}%")
                         ->get();

    return view('articulos.resultados', compact('articulos'));
}



}