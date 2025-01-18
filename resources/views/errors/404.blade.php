@extends('layouts.error-http')

@section('title', 'Página no encontrada')

@section('content')
  <div class="flex items-center justify-center min-h-screen bg-gradient-to-r from-blue-500 to-teal-400">
    <div class="text-center max-w-lg px-8 py-14 bg-white shadow-2xl rounded-3xl transform transition-all duration-300 hover:scale-105">
      <h1 class="font-extrabold text-red-700 animate-pulse text-5xl">404</h1>
      <p class="text-3xl mt-6 text-gray-800 font-semibold">¡Ups! La página que buscas no existe.</p>
      <p class="mt-4 text-lg text-gray-600">Es posible que la URL haya sido cambiada o que nunca haya existido en el servidor.</p>
      <div class="mt-8">
        <a href="{{ route('pages.index') }}" class="inline-block px-8 py-4 bg-indigo-600 text-sevensoup-dark text-lg font-semibold rounded-full shadow-lg hover:bg-indigo-700 hover:shadow-xl transition-all duration-300 transform hover:scale-105">
          Regresar al inicio
        </a>
      </div>
    </div>
  </div>
@endsection
