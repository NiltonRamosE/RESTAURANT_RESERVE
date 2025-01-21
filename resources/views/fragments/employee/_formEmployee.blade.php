<div class="mb-4">
    <label for="nombre" class="block text-sm font-medium text-gray-700 mb-2">Nombre</label>
    <input type="text" id="nombre" name="nombre" value="{{ old('nombre', $empleado->nombre ?? '') }}"
           class="w-full sm:w-96 border border-gray-300 rounded-lg px-3 py-2 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500"
           required>
</div>

<div class="mb-4 flex space-x-4">
    <div class="w-1/2">
        <label for="apellido_paterno" class="block text-sm font-medium text-gray-700 mb-2">Apellido Paterno</label>
        <input type="text" id="apellido_paterno" name="apellido_paterno" value="{{ old('apellido_paterno', $empleado->apellido_paterno ?? '') }}"
               class="w-full sm:w-96 border border-gray-300 rounded-lg px-3 py-2 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500"
               required>
    </div>

    <div class="w-1/2">
        <label for="apellido_materno" class="block text-sm font-medium text-gray-700 mb-2">Apellido Materno</label>
        <input type="text" id="apellido_materno" name="apellido_materno" value="{{ old('apellido_materno', $empleado->apellido_materno ?? '') }}"
               class="w-full sm:w-96 border border-gray-300 rounded-lg px-3 py-2 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500"
               required>
    </div>
</div>

<div class="mb-4">
    <label for="celular" class="block text-sm font-medium text-gray-700 mb-2">Celular</label>
    <input type="text" id="celular" name="celular" value="{{ old('celular', $empleado->celular ?? '') }}"
           class="w-full sm:w-96 border border-gray-300 rounded-lg px-3 py-2 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500"
           maxlength="9" required>
</div>

@if (!isset($empleado))
    <div class="mb-4">
        <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Contraseña</label>
        <input type="password" id="password" name="password" 
               class="w-full sm:w-96 border border-gray-300 rounded-lg px-3 py-2 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500"
               required>
    </div>

    <div class="mb-4">
        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">Confirmar Contraseña</label>
        <input type="password" id="password_confirmation" name="password_confirmation" 
               class="w-full sm:w-96 border border-gray-300 rounded-lg px-3 py-2 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500"
               required>
    </div>
@endif

<div class="flex justify-end space-x-4">
    <a href="{{ route('empleados.index') }}" 
            class="px-4 py-2 bg-gray-400 text-white rounded-lg hover:bg-gray-600">
        Regresar
    </a>
    <button type="submit" 
            class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-500">
        Confirmar
    </button>
</div>
