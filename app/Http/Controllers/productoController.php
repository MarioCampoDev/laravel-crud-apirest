<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class productoController extends Controller
{
    public function index()
    {
        $productos = Producto::all();

        if ($productos->isEmpty()) {
            $data = [
                'message' => 'No existen productos en este momento.',
                'status' => 200
            ];

            return response()->json($data, 200);
        }

        $data = [
            'productos' => $productos,
            'status' => 200
        ];
        
        return response()->json($data, 200);
    }
}
