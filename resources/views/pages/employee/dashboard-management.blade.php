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
                <canvas id="chartReservas" class="mt-4 h-64"></canvas>
            </div>
        
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h3 class="text-lg font-semibold text-gray-700">Ocupación de Mesas</h3>
                <canvas id="chartOcupacion" class="mt-4 h-64"></canvas>
            </div>
        </div>        
    </section>

    <script>
        const reservasPorMesData = @json(array_values($chartData['reservasPorMes']));
        const reservasPorMesLabels = @json($chartData['meses']);
    
        new Chart(document.getElementById('chartReservas'), {
            type: 'bar',
            data: {
                labels: reservasPorMesLabels,
                datasets: [{
                    label: 'Reservas',
                    data: reservasPorMesData,
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    
        const ocupacionMesasData = @json(array_values($chartData['ocupacionMesas']));
        const ocupacionMesasLabels = @json(array_keys($chartData['ocupacionMesas']));
    
        new Chart(document.getElementById('chartOcupacion'), {
            type: 'pie',
            data: {
                labels: ocupacionMesasLabels,
                datasets: [{
                    data: ocupacionMesasData,
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.5)',
                        'rgba(255, 99, 132, 0.5)',
                        'rgba(255, 205, 86, 0.5)'
                    ]
                }]
            }
        });
    </script>    
@endsection
