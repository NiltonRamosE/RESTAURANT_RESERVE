<div class="relative">
    <button class="w-full h-24 bg-sevensoup-green text-sevensoup-dark font-semibold rounded-lg shadow-md hover:bg-sevensoup-dark hover:text-sevensoup-light focus:outline-none focus:ring-2 focus:ring-sevensoup-green {{ $m->estado === "LIBRE" ? 'cursor-pointer' : 'cursor-not-allowed opacity-50' }}">
        <div class="flex items-center justify-center space-x-2">
            <span class="material-symbols-outlined">
                table_bar
            </span>
            <span>Mesa {{ $m->numero }}</span>
        </div>
    </button>
    @if ($m->estado === "LIBRE")
        <span class="absolute top-2 right-2 text-xs text-sevensoup-light bg-sevensoup-dark px-2 py-1 rounded-full">Disponible</span>
    @else
        <span class="absolute top-2 right-2 text-xs text-sevensoup-light bg-sevensoup-red px-2 py-1 rounded-full">No disponible</span>
    @endif
</div>