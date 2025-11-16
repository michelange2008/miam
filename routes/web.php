<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InfosController;
use App\Http\Controllers\RationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/infos', [InfosController::class, 'index'])->name('infos');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

Route::middleware('auth', 'verified')->group(function() {
    Route::get('/', [RationController::class, 'index'])->name('miam.index');
    Route::get('/nouvelle_ration', [RationController::class, 'nouveau'])->name('miam.nouveau');
    Route::post('/set-troupeau', [RationController::class, 'setTroupeau'])->name('set-troupeau');
    Route::get('/especes/{espece}/productions', [RationController::class, 'getProductions']);
    Route::get('/productions/{production}/races', [RationController::class, 'getRaces']);
    Route::get('/races/{race}/physiologies', [RationController::class, 'getPhysiologies']);
});

require __DIR__ . '/auth.php';
