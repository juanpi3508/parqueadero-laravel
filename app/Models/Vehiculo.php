<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    protected $table = 'vehiculos';

    protected $fillable = [
        'placa',
        'tipo',
        'propietario',
        'observaciones',
        'estado'
    ];

    protected $casts = [
        'hora_salida' => 'datetime',
    ];


    static public function getVehiculos()
    {
        return self::where('estado', 'ingreso')->get();
    }


    static public function getVehiculosById($id)
    {
        return self::find($id);
    }

    static public function createVehiculo($data)
    {
        return self::create($data);
    }

    static public function updateVehiculo($data, Vehiculo $vehiculo)
    {
        return $vehiculo->update($data);
    }

    static public function deleteVehiculo(Vehiculo $vehiculo)
    {
        return $vehiculo->delete();
    }
}
