<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return 'Hello, World!';
});
Route::get('/welcome', function () {
    return view('welcome');
});
Route::get('/items', function () {
    return view('items.index');

})->name('items.index');
Route::get('/items/create', function () {
    return view('items.create');
})->name('items.create');
Route::post('/items', function () {})->name('items.store');
Route::get('/items/{item}', function () {})->name('items.show');
Route::get('/items/{item}/edit', function () {})->name('items.edit');
Route::put('/items/{item}', function () {})->name('items.update');
Route::delete('/items/{item}', function () {})->name('items.destroy');

// We voegen ook een redirect toe aan de routes die de hoofdpagina doorverwijst naar de '/items' route
Route::redirect('/', '/items');