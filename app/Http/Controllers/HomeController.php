<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articulo;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Aplica el middleware de autenticación a todas las rutas excepto 'index'
        $this->middleware('auth')->except('index');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Obtener solo los artículos con estado igual a 1
        $articulos = Articulo::where('estado', 1)
                             ->orderBy('created_at', 'desc')
                             ->take(2)
                             ->get();

        return view('welcome', compact('articulos'));
    }

}
