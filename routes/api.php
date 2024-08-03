<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/productos', function () {
    return 'Listado de productos';
});

Route::get('/productos/{id}', function () {
    return 'Listado de producto';
});

Route::post('/productos', function () {
    return 'Creacion de productos';
});

Route::put('/productos/{id}', function () {
    return 'Actualizacion de productos';
});

Route::delete('/productos/{id}', function () {
    return 'Borrado de productos';
});
