<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LivroController;

Route::get('/livros/create', [LivroController::class, 'create']);

Route::post('/livros/store', [LivroController::class, 'store']);