@extends('layouts.default-management')

@section('header-title', 'Administración de Mesas - Ver Registro')

@section('title', 'Ver Mesa')

@section('content-management')
    <section>
        <div class="container mx-auto px-4">
            <h1 class="text-3xl font-bold text-gray-800 mb-6">Información de Mesa</h1>
            
            <div class="mb-4">
                <label for="numero" class="block text-sm font-medium text-gray-700 mb-2">Número</label>
                <input 
                    type="number" 
                    value="{{ $mesas_management->numero }}"
                    class="w-full sm:w-96 border border-gray-300 rounded-lg px-3 py-2 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    disabled
                >
            </div>
            
            <div class="mb-4">
                <label for="cantidad_asientos" class="block text-sm font-medium text-gray-700 mb-2">Cantidad de Asientos</label>
                <input 
                    type="number" 
                    value="{{ $mesas_management->cantidad_asientos }}"
                    class="w-full sm:w-96 border border-gray-300 rounded-lg px-3 py-2 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    disabled
                >
            </div>
            
            <div class="mb-4">
                <label for="precio" class="block text-sm font-medium text-gray-700 mb-2">Precio</label>
                <input 
                    type="text" 
                    value="{{  $mesas_management->precio }}"
                    class="w-full sm:w-96 border border-gray-300 rounded-lg px-3 py-2 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    disabled
                >
            </div>
            
            <div class="mb-4">
                <label for="piso" class="block text-sm font-medium text-gray-700 mb-2">Piso</label>
                <input 
                    type="number" 
                    value="{{ $mesas_management->piso }}"
                    class="w-full sm:w-96 border border-gray-300 rounded-lg px-3 py-2 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    disabled
                >
            </div>
            

            <div class="mb-4">
                <label for="estado" class="block text-sm font-medium text-gray-700 mb-2">Estado</label>
                <input 
                    type="text" 
                    value="{{ $mesas_management->estado }}"
                    class="w-full sm:w-96 border border-gray-300 rounded-lg px-3 py-2 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    disabled
                >
            </div>
            
            <div class="flex justify-end space-x-4">
                <a href="{{ route('mesas-management.index') }}" 
                        class="px-4 py-2 bg-gray-400 text-white rounded-lg hover:bg-gray-600">
                    Regresar
                </a>
            </div>
        </div>
    </section>
@endsection
