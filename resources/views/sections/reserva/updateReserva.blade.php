@extends('layouts.default-management')

@section('header-title', 'Administración de Reserva - Actualizar')

@section('title', 'Actualizar Reserva')

@section('content-management')
    <section>
        <div class="container mx-auto px-4">
            <h1 class="text-3xl font-bold text-gray-800 mb-6">Editar Reserva</h1>
            @include('fragments._error')
            <form action="{{ route('reserva.update', $reserva->id) }}" method="POST">
                @csrf
                @method('PUT')

                @include('fragments.reserva._formReserva')
            </form>
        </div>
    </section>
@endsection

