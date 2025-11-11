<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InfosController;
use App\Http\Controllers\RationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/infos', [InfosController::class, 'index'])->name('infos');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // routes/web.php
    Route::get('/miam', [RationController::class, 'index'])->name('miam.form');
    Route::get('/miam/especes/{espece}/productions', [RationController::class, 'getProductions']);
    Route::get('/miam/productions/{production}/races', [RationController::class, 'getRaces']);
    Route::get('/miam/races/{race}/physiologies', [RationController::class, 'getPhysiologies']);
});

require __DIR__ . '/auth.php';
