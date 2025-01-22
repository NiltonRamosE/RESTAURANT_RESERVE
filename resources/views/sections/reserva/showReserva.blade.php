@extends('layouts.default-management')

@section('header-title', 'Administración de Reserva - Ver Registro')

@section('title', 'Ver Reserva')

@section('content-management')
    <section>
        <div class="container mx-auto px-4">
            <h1 class="text-3xl font-bold text-gray-800 mb-6">Información de Reserva</h1>
            
            <div class="mb-4">
                <label for="fecha" class="block text-sm font-medium text-gray-700 mb-2">Fecha</label>
                <input 
                    type="text" 
                    value="{{ $reserva->fecha }}"
                    class="w-full sm:w-96 border border-gray-300 rounded-lg px-3 py-2 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    disabled
                >
            </div>
            
            <div class="mb-4">
                <label for="hora" class="block text-sm font-medium text-gray-700 mb-2">Hora</label>
                <input 
                    type="text" 
                    value="{{ $reserva->hora }}"
                    class="w-full sm:w-96 border border-gray-300 rounded-lg px-3 py-2 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    disabled
                >
            </div>
            
            <div class="mb-4">
                <label for="mesa_id" class="block text-sm font-medium text-gray-700 mb-2">Mesa</label>
                <input 
                    type="text" 
                    value="{{ $mesa->numero }}"
                    class="w-full sm:w-96 border border-gray-300 rounded-lg px-3 py-2 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    disabled
                >
            </div>
            
            <div class="mb-4">
                <label for="duracion" class="block text-sm font-medium text-gray-700 mb-2">Duración</label>
                <input 
                    type="text" 
                    value="{{ $reserva->duracion }}"
                    class="w-full sm:w-96 border border-gray-300 rounded-lg px-3 py-2 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    disabled
                >
            </div>
            
            <div class="mb-4">
                <label for="estado" class="block text-sm font-medium text-gray-700 mb-2">Estado</label>
                <input 
                    type="text" 
                    value="{{ $reserva->estado }}"
                    class="w-full sm:w-96 border border-gray-300 rounded-lg px-3 py-2 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    disabled
                >
            </div>
            
            <div class="flex justify-end space-x-4">
                <a href="{{ route('reserva.dashboard') }}" 
                    class="px-4 py-2 bg-gray-400 text-white rounded-lg hover:bg-gray-600">
                    Regresar
                </a>
            </div>
            
        </div>
    </section>
@endsection
