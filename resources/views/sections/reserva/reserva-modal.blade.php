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
            <div class="flex justify-end space-x-4">
                <button type="button" class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-700" onclick="closeModal()">Cancelar</button>
                <button type="submit" class="px-4 py-2 bg-sevensoup-green text-white rounded-lg hover:bg-sevensoup-dark">Registrar</button>
            </div>
        </form>
    </div>
</div>