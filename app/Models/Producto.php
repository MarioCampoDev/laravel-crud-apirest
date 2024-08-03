<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'producto';

    //Listado de campos para modificar
    protected $fillable = [
        'nombre',
        'precio',
        'categoria',
        'existencia'
    ];
}
