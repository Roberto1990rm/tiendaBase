<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articulo;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function panel()
    {
        $user = Auth::user();
        
        if ($user->is_admin) {
            // Si el usuario es administrador, puede ver todos los artículos sin importar su estado
            $articulos = Articulo::with('user')->get();
        } else {
            // Si el usuario no es administrador, solo puede ver sus propios artículos con estado 1
            $articulos = Articulo::where('user_id', $user->id)->with('user')->get();
        }

        return view('user.panel', compact('articulos'));
    }
}
