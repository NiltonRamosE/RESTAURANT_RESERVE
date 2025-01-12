<div class="menu-item flex flex-col shadow-xl rounded-lg bg-white hover:shadow-2xl transition-shadow duration-300">
    <img src="{{ $image }}" alt="{{ $name }}" class="w-full h-48 object-cover rounded-t-lg">
    <div class="p-6 flex flex-col items-center">
        <h3 class="text-xl font-semibold text-gray-800">{{ $name }}</h3>
        <p class="text-gray-500 mt-3 text-center leading-relaxed">{{ $description }}</p>
        <span class="text-sevensoup-red font-bold mt-4 text-lg">S/ {{ number_format($price, 2) }}</span>
        <button class="mt-4 px-4 py-2 bg-sevensoup-green text-white text-sm font-semibold rounded-lg hover:bg-sevensoup-dark transition-colors duration-300">Agregar al carrito</button>
    </div>
</div>
