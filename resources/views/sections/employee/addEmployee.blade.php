@extends('layouts.default-management')

@section('header-title', 'Administración de Empleados - Registro')

@section('title', 'Registrar Nuevo Empleado')

@section('content-management')
    <section>
        <div class="container mx-auto px-4">
            <h1 class="text-3xl font-bold text-gray-800 mb-6">Registrar Nuevo Empleado</h1>
            @include('fragments._error')
            <form action="{{ route('empleados.store') }}" method="POST">
                @csrf

                @include('fragments.employee._formEmployee')
            </form>
        </div>
    </section>
@endsection
