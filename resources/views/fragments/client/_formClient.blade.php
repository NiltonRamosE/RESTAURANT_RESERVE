<div class="mb-4">
    <label for="nombre" class="block text-sm font-medium text-gray-700 mb-2">Nombre</label>
    <input 
        type="text" 
        id="nombre" 
        name="nombre" 
        value="{{ old('nombre', $cliente->nombre) }}" 
        class="w-full sm:w-96 border border-gray-300 rounded-lg px-3 py-2 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500"
        required
    >
</div>

<div class="mb-4">
    <label for="apellido_paterno" class="block text-sm font-medium text-gray-700 mb-2">Apellido Paterno</label>
    <input 
        type="text" 
        id="apellido_paterno" 
        name="apellido_paterno" 
        value="{{ old('apellido_paterno', $cliente->apellido_paterno) }}" 
        class="w-full sm:w-96 border border-gray-300 rounded-lg px-3 py-2 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500"
        required
    >
</div>

<div class="mb-4">
    <label for="apellido_materno" class="block text-sm font-medium text-gray-700 mb-2">Apellido Materno</label>
    <input 
        type="text" 
        id="apellido_materno" 
        name="apellido_materno" 
        value="{{ old('apellido_materno', $cliente->apellido_materno) }}" 
        class="w-full sm:w-96 border border-gray-300 rounded-lg px-3 py-2 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500"
        required
    >
</div>

<div class="mb-4">
    <label for="celular" class="block text-sm font-medium text-gray-700 mb-2">Celular</label>
    <input 
        type="text" 
        id="celular" 
        name="celular" 
        value="{{ old('celular', $cliente->celular) }}" 
        class="w-full sm:w-96 border border-gray-300 rounded-lg px-3 py-2 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500"
        maxlength="9"
        required
    >
</div>

<div class="mb-4">
    <label for="correo" class="block text-sm font-medium text-gray-700 mb-2">Correo Electrónico</label>
    <input 
        type="email" 
        value="{{ old('correo', $cliente->usuario->correo) }}" 
        class="w-full sm:w-96 border border-gray-300 rounded-lg px-3 py-2 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500"
        disabled
    >
</div>

<div class="flex justify-end space-x-4">
    <a href="{{ route('cliente.show', $cliente->id) }}" 
        class="px-4 py-2 bg-gray-400 text-white rounded-lg hover:bg-gray-600">
        Cancelar
    </a>
    <button type="submit" 
        class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-500">
        Guardar Cambios
    </button>
</div>