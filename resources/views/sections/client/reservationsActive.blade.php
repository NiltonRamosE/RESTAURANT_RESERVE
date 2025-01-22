@extends('layouts.default')

@section('title', 'Reservas Activas')

@section('content')
    <section class="mt-8">
        @php
            $reservations = $reservationsActive;
        @endphp
        <h1 class="text-2xl font-bold mb-6">Reservas Activas</h1>

        @if($reservations->isEmpty())
            <p class="text-gray-600">No hay reservas activas para este cliente.</p>
        @else
            @include('fragments.client._reservations')
        @endif

        <div class="mt-8">
            <a href="{{ url()->previous() }}" 
               class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                Regresar
            </a>
        </div>
    </section>
@endsection
