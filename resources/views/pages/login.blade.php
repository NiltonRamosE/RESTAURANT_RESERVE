@extends('layouts.default')

@section('title', 'Iniciar Sesión')

@section('content')
    <div class="flex justify-center items-center min-h-screen">
        <div class="bg-white p-8 rounded-xl shadow-xl w-full max-w-sm space-y-6">
            <h2 class="text-3xl font-semibold text-center text-gray-800">Iniciar Sesión</h2>

            <form action="" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="correo" class="block text-sm font-medium text-gray-700">Correo electrónico</label>
                    <input type="email" name="correo" id="correo" class="mt-2 p-3 w-full border border-sevensoup-green rounded-lg focus:outline-none focus:ring-2 focus:ring-sevensoup-red focus:border-sevensoup-red placeholder:text-gray-400" placeholder="example@gmail.com" required>
                </div>

                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-gray-700">Contraseña</label>
                    <input type="password" name="password" id="password" class="mt-2 p-3 w-full border border-sevensoup-green rounded-lg focus:outline-none focus:ring-2 focus:ring-sevensoup-red focus:border-sevensoup-red placeholder:text-gray-400" placeholder="Ingresa tu contraseña" required>
                </div>

                <button type="submit" class="w-full py-3 bg-sevensoup-red text-white font-semibold rounded-lg hover:bg-sevensoup-green focus:outline-none focus:ring-2 focus:ring-indigo-500 transition duration-200 ease-in-out">
                    Iniciar sesión
                </button>
            </form>

            <div class="mt-4 text-center">
                <a href="{{ route('pages.register') }}" class="text-sm text-sevensoup-red font-bold">¿No tienes cuenta? ¡Registrate!</a>
            </div>
        </div>
    </div>
@endsection