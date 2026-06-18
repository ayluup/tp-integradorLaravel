<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EquipoController;

Route::middleware(['auth'])->group(function () {

    Route::get('/equipos', [EquipoController::class, 'index'])
        ->name('equipos.index');

    Route::post('/equipos/guardar', [EquipoController::class, 'store'])
        ->name('equipos.store');
});

require __DIR__.'/auth.php';