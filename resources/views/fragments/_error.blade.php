@if ($errors->any())
    @foreach ($errors->all() as $e)
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
        <strong class="font-bold">¡Error!</strong>
        <span class="block sm:inline">{{ $e }}</span>
    </div>
    @endforeach
@endif