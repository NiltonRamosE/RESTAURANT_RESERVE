@extends('layouts.default')

@section('title', 'Iniciar Sesión')

@section('content')
    <div class="flex justify-center items-center min-h-screen">
        <div class="bg-white p-8 rounded-xl shadow-xl w-full max-w-sm space-y-6">
            <h2 class="text-3xl font-semibold text-center text-gray-800">Iniciar Sesión</h2>
            
            @include('fragments._success')
            @include('fragments._error')
            
            <form action="{{ route('auth.login') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="correo" class="block text-sm font-medium text-gray-700">Correo electrónico</label>
                    <input 
                        type="email" 
                        name="correo" 
                        class="mt-2 p-3 w-full border border-sevensoup-green rounded-lg focus:outline-none focus:ring-2 focus:ring-sevensoup-red focus:border-sevensoup-red placeholder:text-gray-400" 
                        placeholder="example@gmail.com" 
                        required
                    >
                </div>

                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-gray-700">Contraseña</label>
                    <input 
                        type="password" 
                        name="password" 
                        class="mt-2 p-3 w-full border border-sevensoup-green rounded-lg focus:outline-none focus:ring-2 focus:ring-sevensoup-red focus:border-sevensoup-red placeholder:text-gray-400" 
                        placeholder="Ingresa tu contraseña" 
                        required
                    >
                </div>

                <button type="submit" class="w-full py-3 bg-sevensoup-red text-white font-semibold rounded-lg hover:bg-sevensoup-green focus:outline-none focus:ring-2 focus:ring-indigo-500 transition duration-200 ease-in-out">
                    Iniciar sesión
                </button>
            </form>

            <div class="mt-4 text-center">
                <a href="{{ route('register.create') }}" class="text-sm text-sevensoup-red font-bold">¿No tienes cuenta? ¡Registrate!</a>
            </div>

            <div class="mt-4 text-center">
                <a href="{{ route('auth.registerGoogle') }}" class="flex items-center justify-center bg-white border border-gray-300 rounded-lg shadow-md py-2 px-4 hover:bg-gray-100 transition ease-in-out duration-200">
                    <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 48 48">
                        <path fill="#fbc02d" d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8c-6.627,0-12-5.373-12-12	s5.373-12,12-12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C12.955,4,4,12.955,4,24s8.955,20,20,20	s20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z"></path><path fill="#e53935" d="M6.306,14.691l6.571,4.819C14.655,15.108,18.961,12,24,12c3.059,0,5.842,1.154,7.961,3.039	l5.657-5.657C34.046,6.053,29.268,4,24,4C16.318,4,9.656,8.337,6.306,14.691z"></path><path fill="#4caf50" d="M24,44c5.166,0,9.86-1.977,13.409-5.192l-6.19-5.238C29.211,35.091,26.715,36,24,36	c-5.202,0-9.619-3.317-11.283-7.946l-6.522,5.025C9.505,39.556,16.227,44,24,44z"></path><path fill="#1565c0" d="M43.611,20.083L43.595,20L42,20H24v8h11.303c-0.792,2.237-2.231,4.166-4.087,5.571	c0.001-0.001,0.002-0.001,0.003-0.002l6.19,5.238C36.971,39.205,44,34,44,24C44,22.659,43.862,21.35,43.611,20.083z"></path>
                    </svg>
                    <span class="text-sm font-bold text-gray-700">Usar mi cuenta de Google</span>
                </a>
            </div>                     
        </div>
    </div>
@endsection