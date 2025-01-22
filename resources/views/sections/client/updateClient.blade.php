@extends('layouts.default')

@section('title', 'Perfil del Cliente - Edición')

@section('content')
    <section class="mt-8">
        <div class="container mx-auto px-4">
            <h1 class="text-3xl font-bold text-gray-800 mb-6">Editar Perfil de Cliente</h1>
            @include('fragments._error')
            <form action="{{ route('cliente.update', $cliente->id) }}" method="POST">
                @csrf
                @method('PUT')

                @include('fragments.client._formClient')
            </form>
        </div>
    </section>
@endsection

