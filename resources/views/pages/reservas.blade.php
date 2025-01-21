@extends('layouts.default')

@section('title', 'Reservas')
@section('estilos')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=table_bar" />
@endsection
@section('content')
    <div class="min-h-screen py-12">
        <div class="max-w-7xl mx-auto px-6">
            <h1 class="text-3xl font-semibold text-center text-sevensoup-dark mb-8">Reservar Mesa</h1>

            <div class="flex justify-center mb-8">
                <img id="floor-croquis" alt="Croquis del lugar" class="w-full max-w-md rounded-lg shadow-md">
            </div>

            <div class="flex justify-center mb-8">
                <button 
                    class="px-6 py-3 text-lg font-medium text-sevensoup-light bg-sevensoup-dark border-2 border-sevensoup-dark rounded-lg hover:bg-sevensoup-green hover:text-sevensoup-dark transition duration-300 ease-in-out"
                    onclick="openModal()">
                    Registrar Reserva
                </button>
            </div>

            @include('fragments._success')
            @include('fragments._error')

            @include('sections.reserva.reserva-modal')

            <div class="flex flex-col md:flex-row justify-center space-y-4 md:space-y-0 md:space-x-4 mb-8">
                <button id="first-floor-btn" class="px-6 py-3 text-lg font-medium text-sevensoup-light bg-sevensoup-green border-2 border-sevensoup-green rounded-lg hover:bg-sevensoup-dark hover:text-sevensoup-light transition duration-300 ease-in-out" onclick="showFloor('first')">
                    Primer Piso
                </button>
                <button id="second-floor-btn" class="px-6 py-3 text-lg font-medium text-sevensoup-dark border-2 border-sevensoup-dark rounded-lg hover:bg-sevensoup-dark hover:text-sevensoup-light transition duration-300 ease-in-out" onclick="showFloor('second')">
                    Segundo Piso
                </button>
            </div>

            <div id="first-floor" class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
                
                @forelse ($mesas as $m)
                    @if ($m->piso == 1)
                        @include('fragments._mesacard')
                    @endif
                @empty
                    @include('fragments._disponibilidad')
                @endforelse
                
            </div>

            <div id="second-floor" class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4 hidden">
                @forelse ($mesas as $m)
                    @if ($m->piso == 2)
                        @include('fragments._mesacard')
                    @endif
                @empty
                    @include('fragments._disponibilidad')
                @endforelse
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

        function openModal() {
            document.getElementById('reservation-modal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('reservation-modal').classList.add('hidden');
        }
    </script>
@endsection
