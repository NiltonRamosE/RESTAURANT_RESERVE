<div class="relative">
    <a href="#" class="block w-full h-24 bg-sevensoup-green text-sevensoup-dark font-semibold rounded-lg shadow-md hover:bg-sevensoup-dark hover:text-sevensoup-light focus:outline-none focus:ring-2 focus:ring-sevensoup-green {{ $m->estado === 'LIBRE' ? '' : 'opacity-50' }}">
        <div class="flex items-center justify-center h-full space-x-2">
            <span class="material-symbols-outlined">
                table_bar
            </span>
            <span>Mesa {{ $m->numero }}</span>
        </div>
    </a>
</div>

