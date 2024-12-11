<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\ItemTypeController;
use App\Http\Controllers\PurchaseController;
use Illuminate\Support\Facades\Route;


Route::prefix('/items')->controller(ItemController::class)->group(function () {
    Route::post('/', 'store');
    Route::get('/', 'get');
    Route::get('/{id}', 'details');
    Route::patch('/{id}', 'update');
    Route::delete('/{id}', 'delete');
});

Route::prefix('/item_types')->controller(ItemTypeController::class)->group(function () {
    Route::post('/', 'store');
    Route::get('/', 'get');
    Route::get('/{id}', 'details');
    Route::patch('/{id}', 'update');
    Route::delete('/{id}', 'delete');
});

Route::prefix('/purchases')->controller(PurchaseController::class)->group(function () {
    Route::post('/', 'store');
    Route::get('/', 'get');
    Route::get('/{id}', 'details');
});