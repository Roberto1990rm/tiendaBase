<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    use HasFactory;

     protected $table = 'articulos'; // Asegúrate de que el nombre de la tabla sea correcto
     protected $fillable = ['nombre', 'precio', 'unidades', 'imagen']; // Ajusta los campos según tu tabla
}

