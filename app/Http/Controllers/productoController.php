<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

    public function store(Request $request)
    {
        $validacion = Validator::make($request->all(), [
            'nombre' => 'required|max: 255',
            'precio' => 'required|max: 10',
            'categoria' => 'required|max: 255',
            'existencia' => 'required|in:Si,No'
        ]);

        if ($validacion->fails()) {
            $data = [
                'message' => 'Error en la validacion de los datos.',
                'errors' => $validacion->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        $producto = Producto::create([
            'nombre' => $request->nombre,
            'precio' => $request->precio,
            'categoria' => $request->categoria,
            'existencia' => $request->existencia
        ]);

        if (!$producto) {
            $data = [
                'message' => 'Error al momento de crear un producto.',
                'status' => 500
            ];
            return response()->json($data, 500);
        }

        $data = [
            'producto' => $producto,
            'status' => 201
        ];

        return response()->json($data, 201);
    }

    public function show($id)
    {
        $producto = Producto::find($id);

        if (!$producto) {
            $data = [
                'message' => 'No se encontro el producto.',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'producto' => $producto,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function delete($id)
    {
        $producto = Producto::find($id);

        if (!$producto) {
            $data = [
                'message' => 'No se encontro el producto.',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $producto->delete();

        $data = [
            'message' => 'Producto eliminado.',
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function update(Request $request, $id)
    {
        $producto = Producto::find($id);

        if (!$producto) {
            $data = [
                'message' => 'No se encontro el producto.',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $validacion = Validator::make($request->all(), [
            'nombre' => 'required|max: 255',
            'precio' => 'required|max: 10',
            'categoria' => 'required|max: 255',
            'existencia' => 'required|in:Si,No'
        ]);

        if ($validacion->fails()) {
            $data = [
                'message' => 'Error en la validacion de los datos.',
                'errors' => $validacion->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }
        
        $producto->nombre = $request->nombre;
        $producto->precio = $request->precio;
        $producto->categoria = $request->categoria;
        $producto->existencia = $request->existencia;
        
        $producto->save();

        $data = [
            'message' => 'Producto actualizado.',
            'producto' => $producto,
            'status' => 200
        ];

        return response()->json($data, 200);
    }
}
