<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\PetsController;

Route::get('/', [PrincipalController::class, 'index']);

Route::resource('appointments', AppointmentController::class);

Route::resource('pets', PetsController::class);
Route::get('/pets', [PetsController::class, 'index'])->name('pets.index');
Route::get('/pets/{id}/delete', [PetsController::class, 'destroy'])->name('pets.delete');
Route::get('/pets/{id}/edit', [PetsController::class, 'edit'])->name('pets.edit');


Route::get('/nosotros', function () {
    return view('nosotros');
});

Route::get('/mascotas', function () {
    return view('mascotas');
});

Route::get('/adoptar', function () {
    return view('adopta');
});

Route::get('/citas', function () {
    return view('citas');
});

Route::get('/contacto', function () {
    return view('contacto');
});

Route::get('/servicios', function () {
    return view('servicios');
});

Route::get('/formadd', function () {
    return view('formadd');
})-> name('formadd');