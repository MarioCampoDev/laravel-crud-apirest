<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/productos', function () {
    return 'Listado de productos';
});
