<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;

Route::get('/categoria', [CategoriaController::class,'index']);

Route::get('/categoria/{id}', [CategoriaController::class, 'show']);

Route::post('/categoria', [CategoriaController::class, 'store']);

Route::put('/categoria/{id}', [CategoriaController::class, 'update']);

Route::patch('/categoria/{id}', [CategoriaController::class, 'updatePartial']);

Route::delete('/categoria/{id}', [CategoriaController::class, 'destroy']);