@extends('layouts.default-management')

@section('header-title', 'Administración de Empleados - Ver Registro')

@section('title', 'Registrar Nuevo Empleado')

@section('content-management')
    <section>
        <div class="container mx-auto px-4">
            <h1 class="text-3xl font-bold text-gray-800 mb-6">Información de Empleado</h1>
            <div class="mb-4">
                <label for="nombre" class="block text-sm font-medium text-gray-700 mb-2">Nombre</label>
                <input 
                    type="text" 
                    id="nombre" 
                    name="nombre" 
                    value="{{ $empleado->nombre }}"
                    class="w-full sm:w-96 border border-gray-300 rounded-lg px-3 py-2 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    disabled
                >
            </div>
            
            <div class="mb-4 flex space-x-4">
                <div class="w-1/2">
                    <label for="apellido_paterno" class="block text-sm font-medium text-gray-700 mb-2">Apellido Paterno</label>
                    <input 
                        type="text" 
                        id="apellido_paterno" 
                        name="apellido_paterno" 
                        value="{{ $empleado->apellido_paterno }}"
                        class="w-full sm:w-96 border border-gray-300 rounded-lg px-3 py-2 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        disabled
                    >
                </div>
            
                <div class="w-1/2">
                    <label for="apellido_materno" class="block text-sm font-medium text-gray-700 mb-2">Apellido Materno</label>
                    <input 
                        type="text" 
                        id="apellido_materno" 
                        name="apellido_materno" 
                        value="{{ $empleado->apellido_materno }}"
                        class="w-full sm:w-96 border border-gray-300 rounded-lg px-3 py-2 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        disabled
                    >
                </div>
            </div>
            
            <div class="mb-4">
                <label for="celular" class="block text-sm font-medium text-gray-700 mb-2">Celular</label>
                <input 
                    type="text" 
                    id="celular" 
                    name="celular" 
                    value="{{ $empleado->celular }}"
                    class="w-full sm:w-96 border border-gray-300 rounded-lg px-3 py-2 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    maxlength="9" 
                    disabled
                >
            </div>

            <div class="flex justify-end space-x-4">
                <a href="{{ route('empleados.index') }}" 
                        class="px-4 py-2 bg-gray-400 text-white rounded-lg hover:bg-gray-600">
                    Regresar
                </a>
            </div>
        </div>
    </section>
@endsection
