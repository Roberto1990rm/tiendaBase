<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    use HasFactory;

    protected $table = 'articulos';

    protected $fillable = [
        'nombre', 
        'precio', 
        'unidades', 
        'imagen', 
        'descripcion', 
        'estado',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

