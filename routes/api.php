<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductosController;

Route::get('/categoria', [CategoriaController::class,'index']);

Route::get('/categoria/{id}', [CategoriaController::class, 'show']);

Route::post('/categoria', [CategoriaController::class, 'store']);

Route::put('/categoria/{id}', [CategoriaController::class, 'update']);

Route::patch('/categoria/{id}', [CategoriaController::class, 'updatePartial']);

Route::delete('/categoria/{id}', [CategoriaController::class, 'destroy']);

Route::get('/categoria/{id}/productos', [CategoriaController::class, 'productosPorCategoria']);


Route::get('/producto', [ProductosController::class,'index']);

Route::get('/producto/{id}', [ProductosController::class, 'show']);

Route::post('/producto', [ProductosController::class, 'store']);

Route::put('/producto/{id}', [ProductosController::class, 'update']);

Route::patch('/producto/{id}', [ProductosController::class, 'updatePartial']);

Route::delete('/producto/{id}', [ProductosController::class, 'destroy']);