<?php

namespace App\Http\Controllers;

use App\Models\Articulo; // Asegúrate de usar tu modelo Articulo si lo tienes definido

class ArticuloController extends Controller
{public function index()
    {
        $articulos = Articulo::all();
        //dd($articulos); // Esto detendrá la ejecución y mostrará los datos de los artículos en el navegador.
        return view('articulos', compact('articulos'));
    }
    
}
