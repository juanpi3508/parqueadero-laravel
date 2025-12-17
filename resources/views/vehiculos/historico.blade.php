@extends('layouts.app')

@section('titulo', 'Histórico de Vehículos')

@section('contenido')
    <h1 class="mb-4">Histórico de Vehículos</h1>

    <div class="table-responsive">
        <table class="table table-striped table-bordered align-middle">
            <thead class="table-dark">
            <tr>
                <th>Placa</th>
                <th>Tipo</th>
                <th>Propietario</th>
                <th>Fecha de ingreso</th>
                <th>Hora de salida</th>
                <th>Última actualización</th>
            </tr>
            </thead>

            <tbody>
            @foreach($vehiculos as $vehiculo)
                <tr class="{{ $vehiculo->estado === 'salida' ? 'opacity-50' : '' }}">
                    <td>{{ $vehiculo->placa }}</td>
                    <td>{{ $vehiculo->tipo }}</td>
                    <td>{{ $vehiculo->propietario ?? '-' }}</td>
                    <td>{{ $vehiculo->created_at->format('d/m/Y H:i') }}</td>
                    <td>
                        @if($vehiculo->hora_salida)
                            {{ $vehiculo->hora_salida->format('d/m/Y H:i') }}
                        @else
                            -
                        @endif
                    </td>
                    <td>{{ $vehiculo->updated_at->format('d/m/Y H:i') }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
