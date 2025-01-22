<nav class="flex items-center justify-between w-full px-5 sm:px-20 backdrop-blur-lg fixed top-0 left-0 right-0 z-50 bg-sevensoup-light shadow-md">
    <a href="{{route('pages.index')}}" class="hidden sm:block flex items-center">
        <img 
            src="{{ secure_asset('logo_seven_soup.png') }}" 
            alt="Logo 7 sopas" 
            class="w-auto h-12 sm:h-16"
        >
    </a>

    <div class="relative sm:hidden">
        <input type="checkbox" id="menu-toggle" class="peer hidden">
        <label 
            for="menu-toggle" 
            class="inline-flex items-center justify-center p-2 text-sevensoup-dark hover:bg-sevensoup-red rounded-md focus:outline-none focus:ring-2 focus:ring-inset focus:ring-sevensoup-green cursor-pointer"
        >
            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </label>

        <ul class="absolute top-full left-0 w-screen flex flex-col items-center space-y-4 bg-sevensoup-light shadow-lg p-6 transition-all transform origin-top scale-y-0 peer-checked:scale-y-100 peer-checked:opacity-100 opacity-0 sm:hidden">
            <li>
                <a href="{{route('pages.index')}}" class="block text-sevensoup-dark hover:text-sevensoup-red transition-colors font-bold">Inicio</a>
            </li>
            @include('fragments._itemnavbar')
        </ul>
    </div>

    <ul class="hidden sm:flex lg:items-center sm:space-x-10">
        @include('fragments._itemnavbar')
    </ul>

    <div class="ml-auto sm:ml-0">
        @auth('usuarios')
            @php
                $client = session('userIsAuthenticated')['user'];
                $correo = session('userIsAuthenticated')['correo'];
                $full_name = $client->nombre . ' ' . $client->apellido_paterno . ' ' . $client->apellido_materno;
            @endphp
            <div x-data="{ open: false }" class="relative">
                <button 
                    @click="open = !open"
                    class="flex items-center space-x-2 text-sevensoup-dark hover:text-sevensoup-red transition-colors font-bold focus:outline-none"
                    type="button"
                >
                    <span>{{ $full_name }}</span>
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <ul 
                    x-show="open" 
                    @click.away="open = false"
                    x-transition
                    class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-md shadow-lg text-sm text-sevensoup-dark"
                    style="display: none;"
                >
                    <li class="px-4 py-2 text-gray-500 font-light">
                        {{ $correo }}
                    </li>
                    <li>
                        <a 
                            href="" 
                            class="block px-4 py-2 hover:bg-sevensoup-light hover:text-sevensoup-red transition-colors"
                        >
                            Perfil
                        </a>
                    </li>
                    <li>
                        <form action="{{route('auth.logout')}}" method="POST">
                            @csrf
                            <button 
                                class="w-full text-left px-4 py-2 hover:bg-sevensoup-light hover:text-sevensoup-red transition-colors"
                                type="submit"
                            >
                                Cerrar Sesión
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        @endauth

        @guest('usuarios')
            <a 
                href="{{route('auth.index')}}" 
                class="block text-sevensoup-dark hover:text-sevensoup-red transition-colors font-bold">
                Iniciar Sesión
            </a>
        @endguest
    </div>
</nav>
