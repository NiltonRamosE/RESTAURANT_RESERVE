@extends('layouts.default')

@section('title', 'Reservas')

@section('content')
    <div class="min-h-screen py-12 bg-sevensoup-light">
        <div class="max-w-7xl mx-auto px-6">
            <h1 class="text-3xl font-semibold text-center text-sevensoup-dark mb-8">Reservar Mesa</h1>

            <div class="flex justify-center mb-8">
                <img id="floor-croquis" alt="Croquis del lugar" class="w-full max-w-md rounded-lg shadow-md">
            </div>

            <div class="flex flex-col md:flex-row justify-center space-y-4 md:space-y-0 md:space-x-4 mb-8">
                <button id="first-floor-btn" class="px-6 py-3 text-lg font-medium text-sevensoup-light bg-sevensoup-green border-2 border-sevensoup-green rounded-lg hover:bg-sevensoup-dark hover:text-sevensoup-light transition duration-300 ease-in-out" onclick="showFloor('first')">
                    Primer Piso
                </button>
                <button id="second-floor-btn" class="px-6 py-3 text-lg font-medium text-sevensoup-dark border-2 border-sevensoup-dark rounded-lg hover:bg-sevensoup-dark hover:text-sevensoup-light transition duration-300 ease-in-out" onclick="showFloor('second')">
                    Segundo Piso
                </button>
            </div>

            <div id="first-floor" class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
                @for ($i = 1; $i <= 14; $i++)
                    <div class="relative">
                        <button class="w-full h-24 bg-sevensoup-green text-sevensoup-dark font-semibold rounded-lg shadow-md hover:bg-sevensoup-dark hover:text-sevensoup-light focus:outline-none focus:ring-2 focus:ring-sevensoup-green {{ $i <= 7 ? 'cursor-pointer' : 'cursor-not-allowed opacity-50' }}" 
                            {{ $i <= 7 ? 'onclick="alert(\'Reserva para la mesa ' . $i . ' en el primer piso\')"' : 'disabled' }}>
                            <div class="flex items-center justify-center space-x-2">
                                <span class="material-symbols-outlined">
                                    table_bar
                                </span>
                                <span>Mesa {{ $i }}</span>
                            </div>
                        </button>
                        @if ($i <= 7)
                            <span class="absolute top-2 right-2 text-xs text-sevensoup-light bg-sevensoup-dark px-2 py-1 rounded-full">Disponible</span>
                        @else
                            <span class="absolute top-2 right-2 text-xs text-sevensoup-light bg-sevensoup-red px-2 py-1 rounded-full">No disponible</span>
                        @endif
                    </div>
                @endfor
            </div>

            <div id="second-floor" class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4 hidden">
                @for ($i = 15; $i <= 28; $i++)
                    <div class="relative">
                        <button class="w-full h-24 bg-sevensoup-green text-sevensoup-dark font-semibold rounded-lg shadow-md hover:bg-sevensoup-dark hover:text-sevensoup-light focus:outline-none focus:ring-2 focus:ring-sevensoup-green {{ $i <= 21 ? 'cursor-pointer' : 'cursor-not-allowed opacity-50' }}" 
                            {{ $i <= 21 ? 'onclick="alert(\'Reserva para la mesa ' . $i . ' en el segundo piso\')"' : 'disabled' }}>
                            <div class="flex items-center justify-center space-x-2">
                                <span class="material-symbols-outlined">
                                    table_bar
                                </span>
                                <span>Mesa {{ $i }}</span>
                            </div>
                        </button>
                        @if ($i <= 21)
                            <span class="absolute top-2 right-2 text-xs text-sevensoup-light bg-sevensoup-dark px-2 py-1 rounded-full">Disponible</span>
                        @else
                            <span class="absolute top-2 right-2 text-xs text-sevensoup-light bg-sevensoup-red px-2 py-1 rounded-full">No disponible</span>
                        @endif
                    </div>
                @endfor
            </div>

        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            showFloor('first');
        });

        function showFloor(floor) {
            const croquis = document.getElementById('floor-croquis');
            if (floor === 'first') {
                document.getElementById('first-floor').classList.remove('hidden');
                document.getElementById('second-floor').classList.add('hidden');
                document.getElementById('first-floor-btn').classList.add('bg-sevensoup-dark', 'text-sevensoup-light');
                document.getElementById('first-floor-btn').classList.remove('bg-sevensoup-green', 'text-sevensoup-dark');
                document.getElementById('second-floor-btn').classList.add('text-sevensoup-dark', 'border-sevensoup-dark');
                document.getElementById('second-floor-btn').classList.remove('bg-sevensoup-dark', 'text-sevensoup-light');

                croquis.src = "{{ secure_asset('example.jpg') }}";
            } else {
                document.getElementById('second-floor').classList.remove('hidden');
                document.getElementById('first-floor').classList.add('hidden');
                document.getElementById('second-floor-btn').classList.add('bg-sevensoup-dark', 'text-sevensoup-light');
                document.getElementById('second-floor-btn').classList.remove('text-sevensoup-dark', 'border-sevensoup-dark');
                document.getElementById('first-floor-btn').classList.add('bg-sevensoup-green', 'text-sevensoup-dark');
                document.getElementById('first-floor-btn').classList.remove('bg-sevensoup-dark', 'text-sevensoup-light');
                croquis.src = "{{ secure_asset('example2.jpg') }}";
            }
        }
    </script>
@endsection
