@extends('layouts.default-management')

@section('header-title', 'Administración de Mesas - Registro')

@section('title', 'Registrar Nueva Mesa')

@section('content-management')
    <section>
        <div class="container mx-auto px-4">
            <h1 class="text-3xl font-bold text-gray-800 mb-6">Registrar Nueva Mesa</h1>
            @include('fragments._error')
            <form action="{{ route('mesas-management.store') }}" method="POST">
                @csrf
                @include('fragments.mesa._formMesa')
            </form>
        </div>
    </section>
@endsection
