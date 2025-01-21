<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title')</title>
        @vite('resources/css/app.css')
        <script src="//unpkg.com/alpinejs" defer></script>
    </head>
    <body>
        @php
            $employee = session('userIsAuthenticated')['user'];

            $full_name = $employee->nombre . ' ' . $employee->apellido_paterno . ' ' . $employee->apellido_materno
        @endphp
        <div x-data="{ isOpen: true }" class="flex h-screen">
            @include('partials.sidebar')

            <div 
                x-bind:class="isOpen ? 'sm:ml-64' : 'ml-0'" 
                class="flex-1 flex flex-col transition-all duration-300"
            >
                <header class="bg-white shadow px-6 py-4 flex justify-between items-center">
                    <h2 class="text-2xl font-semibold">@yield('header-title', 'Bienvenido') {{ $full_name }}</h2>
                    <button 
                        @click="isOpen = true" 
                        class="text-blue-800 hover:text-blue-600 "
                        x-bind:class="isOpen ? 'hidden' : 'block'" 
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z"/></svg>
                    </button>
                </header>

                <main class="flex-1 p-6 overflow-y-auto">
                    @yield('content-management')
                </main>

                @include('partials.footer')
            </div>
        </div>
    </body>
</html>