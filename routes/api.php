<?php

use App\Http\Controllers\ItemController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('items')->group(function () {
	Route::get('/', [ItemController::class, 'list']);
	Route::get('/{id}', [ItemController::class, 'listById']);
	Route::post('/', [ItemController::class, 'store']);
	Route::put('/{id}', [ItemController::class, 'update']);
	Route::delete('/{id}', [ItemController::class, 'destroy']);
});
