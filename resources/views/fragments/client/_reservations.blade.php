<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach($reservations as $reserva)
        <div class="border border-gray-200 rounded-xl shadow-md hover:shadow-lg p-6 bg-gradient-to-r from-gray-100 to-gray-50">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-xl font-semibold text-gray-800">Mesa #{{ $reserva->mesa->numero }}</h2>
                <span class="text-sm font-medium text-white px-3 py-1 rounded-full {{ $reserva->estado === 'APROBADO' ? 'bg-green-500' : ($reserva->estado === 'CANCELADO' ? 'bg-red-500' : 'bg-yellow-500') }}">
                    {{ ucfirst(strtolower($reserva->estado)) }}
                </span>
            </div>
            <div class="text-gray-800">
                <div class="mb-4">
                    <p class="text-sm font-medium text-gray-500">Fecha de la Reserva</p>
                    <p class="text-lg font-semibold">{{ \Carbon\Carbon::parse($reserva->fecha)->format('d/m/Y') }}</p>
                </div>
            
                <div class="mb-4">
                    <p class="text-sm font-medium text-gray-500">Hora</p>
                    <p class="text-lg font-semibold">{{ $reserva->hora }}</p>
                </div>
            
                <div class="mb-4">
                    <p class="text-sm font-medium text-gray-500">Duración</p>
                    <p class="inline-block px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm font-semibold">
                        {{ $reserva->duracion }}
                    </p>
                </div>
            
                <div class="mb-4">
                    <p class="text-sm font-medium text-gray-500">Precio</p>
                    <p class="text-lg font-semibold text-green-600">S/. {{ number_format($reserva->mesa->precio, 2) }}</p>
                </div>
            
                <div>
                    <p class="text-sm font-medium text-gray-500">Piso</p>
                    <p class="text-lg font-semibold">{{ $reserva->mesa->piso }}</p>
                </div>
            </div>            
        </div>
    @endforeach
</div>


<div class="mt-6">
    {{ $reservations->links('pagination::tailwind') }}
</div>