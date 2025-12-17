<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehiculoController;
use App\Models\Vehiculo; // ← IMPORTANTE

Route::get('/', function () {
    return redirect()->route('vehiculos.index');
});

Route::resource('vehiculos', VehiculoController::class);

Route::get('/historico', function () {
    $vehiculos = Vehiculo::orderBy('created_at', 'desc')->get();
    return view('vehiculos.historico', compact('vehiculos'));
})->name('vehiculos.historico');
