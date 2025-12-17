<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use Illuminate\Http\Request;

class VehiculoController extends Controller
{
    public function index()
    {
        $vehiculos = Vehiculo::getVehiculos();
        return view('vehiculos.index', compact('vehiculos'));
    }

    public function create()
    {
        return view('vehiculos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'placa' => 'required|max:10',
            'tipo' => 'required',
        ]);

        $data = $request->all();
        $data['estado'] = $data['estado'] ?? 'ingreso';

        Vehiculo::createVehiculo($data);

        return redirect()->route('vehiculos.index')->with('success', 'Vehículo registrado.');
    }


    public function edit(Vehiculo $vehiculo)
    {
        return view('vehiculos.edit', compact('vehiculo'));
    }

    public function update(Request $request, Vehiculo $vehiculo)
    {
        $request->validate([
            'placa' => 'required|max:10',
            'tipo' => 'required',
        ]);

        Vehiculo::updateVehiculo($request->all(), $vehiculo);

        return redirect()->route('vehiculos.index')->with('success', 'Vehículo actualizado.');
    }

    public function destroy(Vehiculo $vehiculo)
    {
        $vehiculo->estado = 'salida';
        $vehiculo->hora_salida = now(); // <-- aquí marcamos la hora exacta
        $vehiculo->save();

        return redirect()->route('vehiculos.index')
            ->with('success', 'Vehículo marcado como salida.');
    }


}
