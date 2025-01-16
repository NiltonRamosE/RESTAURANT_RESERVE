<div id="reservation-modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
    <div class="bg-white rounded-lg shadow-lg w-11/12 sm:w-1/2 lg:w-1/3 p-6">
        <h2 class="text-xl font-bold text-sevensoup-dark mb-4">Registrar Reserva</h2>
        <form action="{{ route('reserva.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="mesa" class="block text-sm font-medium text-sevensoup-dark mb-2">Selecciona una mesa</label>
                <select 
                    name="mesa_id" 
                    id="mesa" 
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sevensoup-dark bg-white focus:outline-none focus:ring-2 focus:ring-sevensoup-green focus:border-sevensoup-green">
                    @foreach ($mesas as $m)
                        <option value="{{ $m->id }}">Mesa {{ $m->numero }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="mb-4">
                <label for="fecha" class="block text-sm font-medium text-sevensoup-dark mb-2">Fecha</label>
                <input type="date" id="fecha" name="fecha" class="w-full border rounded-lg px-3 py-2 text-sevensoup-dark focus:outline-none focus:ring-2 focus:ring-sevensoup-green" required>
            </div>

            <div class="mb-4">
                <label for="hora" class="block text-sm font-medium text-sevensoup-dark mb-2">Hora</label>
                <input type="time" id="hora" name="hora" class="w-full border rounded-lg px-3 py-2 text-sevensoup-dark focus:outline-none focus:ring-2 focus:ring-sevensoup-green" required>
            </div>
            
            <div class="mb-4">
                <label for="precio" class="block text-sm font-medium text-sevensoup-dark mb-2">Precio</label>
                <input 
                    type="text" 
                    id="precio" 
                    name="precio" 
                    class="w-full border rounded-lg px-3 py-2 text-sevensoup-dark focus:outline-none focus:ring-2 focus:ring-sevensoup-green" 
                    disabled
                >
            </div>

            <div class="flex justify-end space-x-4">
                <button type="button" class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-700" onclick="closeModal()">Cancelar</button>
                @if (session('userSession'))
                <button type="submit" class="px-4 py-2 bg-sevensoup-green text-white rounded-lg hover:bg-sevensoup-dark">Registrar</button>
                @else
                <a href="{{ route('auth.index') }}" class="px-4 py-2 bg-sevensoup-green text-white rounded-lg hover:bg-sevensoup-dark">Iniciar Sesión</a>
                @endif
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const mesaSelect = document.getElementById('mesa');
        const precioInput = document.getElementById('precio');

        mesaSelect.addEventListener('change', function () {
            const mesaId = this.value;

            fetch(`/mesas/${mesaId}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Error al obtener los datos de la mesa');
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        precioInput.value = `S/ ${parseFloat(data.precio).toFixed(2)}`;
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        });
    });
</script>

