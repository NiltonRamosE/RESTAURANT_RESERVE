<div class="mb-4">
    <label for="fecha" class="block text-sm font-medium text-gray-700 mb-2">Fecha</label>
    <input 
        type="date" 
        id="fecha" 
        name="fecha" 
        value="{{ old('fecha', $reserva->fecha) }}"
        class="w-full sm:w-96 border border-gray-300 rounded-lg px-3 py-2 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500"
        required
    >
</div>

<div class="mb-4">
    <label for="hora" class="block text-sm font-medium text-gray-700 mb-2">Hora</label>
    <input 
        type="time" 
        id="hora" 
        name="hora" 
        value="{{ old('hora', $reserva->hora) }}"
        class="w-full sm:w-96 border border-gray-300 rounded-lg px-3 py-2 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500"
        required
    >
</div>

<div class="mb-4">
    <label for="mesa_id" class="block text-sm font-medium text-gray-700 mb-2">Mesa</label>
    <select 
        id="mesa_id" 
        name="mesa_id"
        class="w-full sm:w-96 border border-gray-300 rounded-lg px-3 py-2 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500"
        required
    >
        @foreach ($mesas as $mesa)
            <option value="{{ $mesa->id }}" {{ old('mesa_id', $reserva->mesa_id) == $mesa->id ? 'selected' : '' }}>
                Mesa {{ $mesa->numero }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-4">
    <label for="duracion" class="block text-sm font-medium text-gray-700 mb-2">Duración</label>
    <select 
        id="duracion" 
        name="duracion"
        class="w-full sm:w-96 border border-gray-300 rounded-lg px-3 py-2 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500"
        required
    >
        <option value="RAPIDO" {{ old('duracion', $reserva->duracion) == 'RAPIDO' ? 'selected' : '' }}>RÁPIDO</option>
        <option value="PROMEDIO" {{ old('duracion', $reserva->duracion) == 'PROMEDIO' ? 'selected' : '' }}>PROMEDIO</option>
        <option value="EXTENDIDO" {{ old('duracion', $reserva->duracion) == 'EXTENDIDO' ? 'selected' : '' }}>EXTENDIDO</option>
    </select>
</div>

<div class="mb-4">
    <label for="estado" class="block text-sm font-medium text-gray-700 mb-2">Estado</label>
    <select 
        id="estado" 
        name="estado"
        class="w-full sm:w-96 border border-gray-300 rounded-lg px-3 py-2 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500"
        required
    >
        <option value="APROBADO" {{ old('estado', $reserva->estado) == 'APROBADO' ? 'selected' : '' }}>APROBADO</option>
        <option value="CANCELADO" {{ old('estado', $reserva->estado) == 'CANCELADO' ? 'selected' : '' }}>CANCELADO</option>
        <option value="REPROGRAMADO" {{ old('estado', $reserva->estado) == 'REPROGRAMADO' ? 'selected' : '' }}>REPROGRAMADO</option>
        <option value="EN CURSO" {{ old('estado', $reserva->estado) == 'EN CURSO' ? 'selected' : '' }}>EN CURSO</option>
        <option value="EFECTUADO" {{ old('estado', $reserva->estado) == 'EFECTUADO' ? 'selected' : '' }}>EFECTUADO</option>
    </select>
</div>

<div class="flex justify-end space-x-4">
    <a href="{{ route('reserva.dashboard') }}" 
        class="px-4 py-2 bg-gray-400 text-white rounded-lg hover:bg-gray-600">
        Regresar
    </a>
    <button type="submit" 
        class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-500">
        Confirmar
    </button>
</div>
