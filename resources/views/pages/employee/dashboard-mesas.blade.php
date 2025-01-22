@extends('layouts.default-management')

@section('header-title', 'Administración de Mesas')

@section('title', 'Dashboard Mesas')

@section('content-management')
<section>
    <div class="container mx-auto px-4">
        <div class="flex flex-wrap justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Lista de Mesas</h1>
            <a 
                href="{{ route('mesas-management.create') }}" 
                class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-500 shadow-lg transition-all duration-300"
            >
                + Nueva Mesa
            </a>
        </div>

        @include('fragments._success')

        <div class="overflow-x-auto rounded-lg shadow-md">
            <table class="min-w-full bg-white border border-gray-200">
                <thead class="bg-gradient-to-r from-blue-500 to-blue-700 text-white">
                    <tr>
                        <th class="px-6 py-4 text-left text-sm font-semibold uppercase tracking-wider">Número</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold uppercase tracking-wider">Cantidad de Asientos</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold uppercase tracking-wider">Precio</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold uppercase tracking-wider">Piso</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold uppercase tracking-wider">Estado</th>
                        <th class="px-6 py-4 text-center text-sm font-semibold uppercase tracking-wider">Acciones</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200">
                    @foreach ($mesas as $mesa)
                        <tr class="hover:bg-blue-50 transition duration-300">
                            <td class="px-6 py-4 text-sm text-gray-800 font-medium whitespace-nowrap">
                                {{ $mesa->numero }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600 whitespace-nowrap">
                                {{ $mesa->cantidad_asientos }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600 whitespace-nowrap">
                                S/. {{ number_format($mesa->precio, 2) }} 
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600 whitespace-nowrap">
                                Piso {{ $mesa->piso }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600 whitespace-nowrap">
                                {{ $mesa->estado }}
                            </td>

                            <td class="px-6 py-4 text-center whitespace-nowrap">
                                <div class="flex justify-center gap-2">
                                    <a 
                                        href="{{ route('mesas-management.show', $mesa->id) }}" 
                                        class="bg-blue-500 hover:bg-blue-400 text-white px-3 py-2 rounded-lg transition duration-300"
                                        title="Ver"
                                    >
                                        <i class="fas fa-eye"></i>
                                    </a>

                                    <a 
                                        href="{{ route('mesas-management.edit', $mesa->id) }}" 
                                        class="bg-yellow-500 hover:bg-yellow-400 text-white px-3 py-2 rounded-lg transition duration-300"
                                        title="Editar"
                                    >
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <form 
                                        action="{{ route('mesas-management.destroy', $mesa->id) }}" 
                                        method="POST" 
                                        onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta mesa?');" 
                                        class="inline"
                                    >
                                        @csrf
                                        @method('DELETE')
                                        <button 
                                            type="submit" 
                                            class="bg-red-500 hover:bg-red-400 text-white px-3 py-2 rounded-lg transition duration-300"
                                            title="Eliminar"
                                        >
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{ $mesas->links('pagination::tailwind') }}
        </div>
    </div>
</section>
@endsection
