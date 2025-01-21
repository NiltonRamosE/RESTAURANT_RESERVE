@extends('layouts.default-management')

@section('title', 'Dashboard Principal')

@section('content-management')
    <section>
        <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-6">
            <div class="bg-blue-500 text-white p-6 rounded-lg shadow-lg">
                <h3 class="text-lg font-semibold">Total de Empleados</h3>
                <p class="text-3xl font-bold mt-2">{{ $dataCards['numberOfEmployees'] }}</p>
                <p class="text-sm mt-1">Última actualización: {{ $dataCards['lastestUpdateDate'] }}</p>
            </div>
    
            <div class="bg-green-500 text-white p-6 rounded-lg shadow-lg">
                <h3 class="text-lg font-semibold">Reservas Activas</h3>
                <p class="text-3xl font-bold mt-2">{{ $dataCards['reservationsActives'] }} </p>
                <p class="text-sm mt-1">Reservas gestionadas</p>
            </div>
    
            <div class="bg-yellow-500 text-white p-6 rounded-lg shadow-lg">
                <h3 class="text-lg font-semibold">Clientes Registrados</h3>
                <p class="text-3xl font-bold mt-2">{{ $dataCards['numberOfClients'] }}</p>
                <p class="text-sm mt-1">Clientes totales en el sistema</p>
            </div>
        </div>
    
        <div class="mt-8 grid grid-cols-1 lg:grid-cols-2 gap-6">
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h3 class="text-lg font-semibold text-gray-700">Reservas por Mes</h3>
                <div id="chart-reservas" class="mt-4 h-64">
                    <!-- Aquí se renderizará el gráfico -->
                </div>
            </div>
    
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h3 class="text-lg font-semibold text-gray-700">Ocupación de Mesas</h3>
                <div id="chart-ocupacion" class="mt-4 h-64">
                    <!-- Aquí se renderizará el gráfico -->
                </div>
            </div>
        </div>
    </section>
@endsection
