@extends('layouts.default-management')

@section('header-title', 'Administración de Mesas - Actualizar')

@section('title', 'Actualizar Mesa')

@section('content-management')
    <section>
        
        <div class="container mx-auto px-4">
            <h1 class="text-3xl font-bold text-gray-800 mb-6">Editar Mesa</h1>
            @include('fragments._error')
            <form action="{{ route('mesas-management.update', $mesas_management->id) }}" method="POST">
                @csrf
                @method('PUT')

                @include('fragments.mesa._formMesa')
            </form>
        </div>
    </section>
@endsection

