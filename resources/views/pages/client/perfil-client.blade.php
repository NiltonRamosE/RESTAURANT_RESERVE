@extends('layouts.default')

@section('title', 'Perfil del Cliente')

@section('content')
    <section class="container mx-auto py-10 px-4 sm:px-6 lg:px-8">
        @include('fragments._success')
        <div class="bg-white shadow rounded-lg p-6">
            <div class="flex items-center justify-between mb-6">
                <div class="flex items-center space-x-4">
                    <div class="w-20 h-20 rounded-full bg-gray-200 flex items-center justify-center overflow-hidden">
                        <img src="{{ secure_asset('default-profile.webp') }}" alt="Foto de perfil" class="w-full h-full object-cover">
                    </div>
                    <div>
                        <h1 class="text-xl font-bold text-gray-800">{{ $cliente->nombre }} {{ $cliente->apellido_paterno }} {{ $cliente->apellido_materno }}</h1>
                        <p class="text-gray-500">{{ $cliente->usuario->correo }}</p>
                        <p class="text-gray-500">Celular: {{ $cliente->celular }}</p>
                    </div>
                </div>
            
                <a href="{{ route('cliente.edit', $cliente->id) }}" 
                   class="inline-flex items-center px-4 py-2 bg-sevensoup-light hover:bg-sevensoup-red hover:text-white transition-colors rounded-md shadow text-sm font-semibold text-gray-800">
                    Editar Perfil
                </a>
            </div>            

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <a href="{{ route('cliente.reservationsActives', $cliente->id) }}" class="block p-4 bg-sevensoup-light hover:bg-sevensoup-red hover:text-white transition-colors rounded-lg shadow text-center">
                    <h2 class="text-lg font-semibold">Reservas Actuales</h2>
                    <p class="text-sm text-gray-500">Consulta tus reservas activas.</p>
                </a>

                <a href="{{ route('cliente.reservationsHistory', $cliente->id) }}" class="block p-4 bg-sevensoup-light hover:bg-sevensoup-red hover:text-white transition-colors rounded-lg shadow text-center">
                    <h2 class="text-lg font-semibold">Historial de Reservas</h2>
                    <p class="text-sm text-gray-500">Revisa las reservas que realizaste anteriormente.</p>
                </a>
            </div>
        </div>
    </section>
@endsection
