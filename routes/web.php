<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return 'Hello, World!';
});
Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/items', [ItemController::class, 'index'])->name('items.index');

Route::get('/items/create', [ItemController::class, 'create'])->name('items.create');

Route::post('/items', function () {})->name('items.store');
Route::get('/items/{item}', function () {})->name('items.show');
Route::get('/items/{item}/edit', function () {})->name('items.edit');
Route::put('/items/{item}', function () {})->name('items.update');
Route::delete('/items/{id}', [ItemController::class, 'destroy'])->name('items.destroy');

// We voegen ook een redirect toe aan de routes die de hoofdpagina doorverwijst naar de '/items' route
Route::redirect('/', '/items');