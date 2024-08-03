<?php

use App\Http\Controllers\productoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/productos', [productoController::class, 'index']);

Route::get('/productos/{id}', function () {
    return 'Listado de producto';
});

Route::post('/productos', [productoController::class, 'store']);

Route::put('/productos/{id}', function () {
    return 'Actualizacion de productos';
});

Route::delete('/productos/{id}', function () {
    return 'Borrado de productos';
});
