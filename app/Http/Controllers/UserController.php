<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Articulo;

class UserController extends Controller
{
    public function panel()
    {
        // Recuperar los artículos del usuario autenticado
        $articulos = Articulo::where('user_id', Auth::id())->get();
        return view('user.panel', compact('articulos'));
    }
}
