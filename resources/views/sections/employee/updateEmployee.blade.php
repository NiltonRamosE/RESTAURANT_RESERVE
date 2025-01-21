@extends('layouts.default-management')

@section('header-title', 'Administración de Empleados - Actualizar')

@section('title', 'Actualizar Empleado')

@section('content-management')
    <section>
        
        <div class="container mx-auto px-4">
            <h1 class="text-3xl font-bold text-gray-800 mb-6">Editar Empleado</h1>
            @include('fragments._error')
            <form action="{{ route('empleados.update', $empleado->id) }}" method="POST">
                @csrf
                @method('PUT')

                @include('fragments.employee._formEmployee')
            </form>
        </div>
    </section>
@endsection

