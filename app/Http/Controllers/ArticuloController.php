<?php

namespace App\Http\Controllers;

use App\Models\Articulo; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ArticuloController extends Controller
{   

    public function index()
    {
        $articulos = Articulo::all();
        //dd($articulos); // Esto detendrá la ejecución y mostrará los datos de los artículos en el navegador.
        $articulos = Articulo::where('estado', 1)->get();
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
        ]);

        $articulo = new Articulo($validatedData);
        $articulo->user_id = Auth::id(); // Asignar el ID del usuario autenticado
        $articulo->estado = 0; // Asignar estado por defecto a 0

        if ($request->hasFile('imagen') && $request->file('imagen')->isValid()) {
            $imageName = time() . '.' . $request->imagen->extension();
            $request->imagen->move(public_path('images'), $imageName);
            $articulo->imagen = $imageName;
        }

        $articulo->save();

        return redirect('/articulos')->with('success', 'Artículo guardado exitosamente');
    }


public function destroy($id)
{
    $articulo = Articulo::findOrFail($id);

    if ($articulo->user_id !== Auth::id()) {
        return redirect()->route('/articulos')->with('error', 'No tienes permiso para eliminar este artículo.');
    }

    $articulo->delete();

    return redirect('/articulos')->with('success', 'El artículo ha sido eliminado exitosamente.');
}


public function buscar(Request $request)
{
    $query = $request->input('query');
    $articulos = Articulo::where('estado', 1)
                         ->where(function($queryBuilder) use ($query) {
                             $queryBuilder->where('nombre', 'LIKE', "%{$query}%");
                                          // -&gt;orWhere('descripcion', 'LIKE', "%{$query}%");
                         })
                         ->get();

    return view('articulos.resultados', compact('articulos'));
}







    public function toggleEstado($id)
    {
        $articulo = Articulo::findOrFail($id);

        // Verificar si el usuario es admin
        if (Auth::user()->is_admin) {
            $articulo->estado = !$articulo->estado;
            $articulo->save();

            return redirect()->route('user.panel')->with('success', 'El estado del artículo ha sido cambiado.');
        }

        return redirect()->route('user.panel')->with('error', 'No tienes permiso para realizar esta acción.');
    }
}


