@extends('layouts.default')

@section('title', 'Registro')

@section('content')
    <div class="flex justify-center items-center min-h-screen mt-8">
        <div class="bg-white p-8 rounded-xl shadow-xl w-full max-w-lg space-y-6">
            <h2 class="text-3xl font-semibold text-center text-gray-800">Crear Cuenta</h2>

            @include('fragments._error')

            <form action="{{ route('register.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
                    <input type="text" name="nombre" class="mt-2 p-3 w-full border border-sevensoup-green rounded-lg focus:outline-none focus:ring-2 focus:ring-sevensoup-red focus:border-sevensoup-red" placeholder="Ingresa tu nombre" value="{{ old('nombre', '')}}" required>
                </div>

                <div class="mb-4">
                    <label for="apellido_paterno" class="block text-sm font-medium text-gray-700">Apellido Paterno</label>
                    <input type="text" name="apellido_paterno" class="mt-2 p-3 w-full border border-sevensoup-green rounded-lg focus:outline-none focus:ring-2 focus:ring-sevensoup-red focus:border-sevensoup-red" placeholder="Ingresa tu apellido paterno" value="{{ old('apellido_paterno', '')}}" required>
                </div>

                <div class="mb-4">
                    <label for="apellido_materno" class="block text-sm font-medium text-gray-700">Apellido Materno</label>
                    <input type="text" name="apellido_materno" class="mt-2 p-3 w-full border border-sevensoup-green rounded-lg focus:outline-none focus:ring-2 focus:ring-sevensoup-red focus:border-sevensoup-red" placeholder="Ingresa tu apellido materno" value="{{ old('apellido_materno', '')}}" required>
                </div>

                <div class="mb-4">
                    <label for="celular" class="block text-sm font-medium text-gray-700">Celular</label>
                    <input type="text" name="celular" class="mt-2 p-3 w-full border border-sevensoup-green rounded-lg focus:outline-none focus:ring-2 focus:ring-sevensoup-red focus:border-sevensoup-red" placeholder="Ingresa tu celular" required maxlength="9" value="{{ old('celular', '')}}">
                </div>

                <div class="mb-4">
                    <label for="correo" class="block text-sm font-medium text-gray-700">Correo electrónico</label>
                    <input type="email" name="correo" class="mt-2 p-3 w-full border border-sevensoup-green rounded-lg focus:outline-none focus:ring-2 focus:ring-sevensoup-red focus:border-sevensoup-red" placeholder="Ingresa tu correo electrónico" value="{{ old('correo', '')}}" required>
                </div>

                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-gray-700">Contraseña</label>
                    <input type="password" name="password" class="mt-2 p-3 w-full border border-sevensoup-green rounded-lg focus:outline-none focus:ring-2 focus:ring-sevensoup-red focus:border-sevensoup-red" placeholder="Crea tu contraseña" value="{{ old('password', '')}}" required>
                </div>

                <button type="submit" class="w-full py-3 bg-sevensoup-red text-white font-semibold rounded-lg hover:bg-sevensoup-green focus:outline-none focus:ring-2 focus:ring-indigo-500 transition duration-200 ease-in-out">
                    Registrar
                </button>
            </form>

            <div class="mt-4 text-center">
                <a href="{{ route('auth.index') }}" class="text-sm text-sevensoup-red font-bold">¿Ya tienes una cuenta? Inicia sesión</a>
            </div>
        </div>
    </div>
@endsection
