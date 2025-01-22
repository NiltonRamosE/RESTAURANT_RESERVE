<div class="mb-4">
    <label for="numero" class="block text-sm font-medium text-gray-700 mb-2">Número</label>
    <input 
        type="number" 
        id="numero" 
        name="numero" 
        value="{{ old('numero', $mesas_management->numero ?? '') }}"
        class="w-full sm:w-96 border border-gray-300 rounded-lg px-3 py-2 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500"
        required
    >
</div>

<div class="mb-4">
    <label for="cantidad_asientos" class="block text-sm font-medium text-gray-700 mb-2">Cantidad de Asientos</label>
    <input 
        type="number" id="cantidad_asientos" 
        name="cantidad_asientos" 
        value="{{ old('cantidad_asientos', $mesas_management->cantidad_asientos ?? '') }}"
        class="w-full sm:w-96 border border-gray-300 rounded-lg px-3 py-2 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500"
        required
    >
</div>

<div class="mb-4">
    <label for="precio" class="block text-sm font-medium text-gray-700 mb-2">Precio</label>
    <input 
        type="text" 
        id="precio" 
        name="precio" 
        value="{{ old('precio', $mesas_management->precio ?? '') }}"
        class="w-full sm:w-96 border border-gray-300 rounded-lg px-3 py-2 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500"
        required
    >
</div>

<div class="mb-4">
    <label for="piso" class="block text-sm font-medium text-gray-700 mb-2">Piso</label>
    <input 
        type="number" 
        id="piso" 
        name="piso" 
        value="{{ old('piso', $mesas_management->piso ?? '') }}"
        class="w-full sm:w-96 border border-gray-300 rounded-lg px-3 py-2 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500"
        required
    >
</div>

@if (isset($mesas_management))
<div class="mb-4">
    <label for="estado" class="block text-sm font-medium text-gray-700 mb-2">Estado</label>
    <select 
        id="estado" 
        name="estado"
        class="w-full sm:w-96 border border-gray-300 rounded-lg px-3 py-2 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500"
        required
    >
        <option value="LIBRE" {{ old('estado', $mesas_management->estado ?? '') == 'LIBRE' ? 'selected' : '' }}>LIBRE</option>
        <option value="OCUPADO" {{ old('estado', $mesas_management->estado ?? '') == 'OCUPADO' ? 'selected' : '' }}>OCUPADO</option>
        <option value="MANTENIMIENTO" {{ old('estado', $mesas_management->estado ?? '') == 'MANTENIMIENTO' ? 'selected' : '' }}>MANTENIMIENTO</option>
    </select>
</div>
@endif

<div class="flex justify-end space-x-4">
    <a href="{{ route('mesas-management.index') }}" 
            class="px-4 py-2 bg-gray-400 text-white rounded-lg hover:bg-gray-600">
        Regresar
    </a>
    <button type="submit" 
            class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-500">
        Confirmar
    </button>
</div>
