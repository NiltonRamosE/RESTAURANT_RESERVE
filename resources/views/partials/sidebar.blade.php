<aside 
    x-show="isOpen"
    :class="isOpen ? 'translate-x-0 w-64' : '-translate-x-full w-64'" 
    class="fixed top-0 left-0 h-full bg-green-400 text-black flex flex-col transform transition-transform duration-300 lg:translate-x-0 z-50 shadow-lg"
>
    <div class="p-6 text-center border-b border-green-700">
        <h1 class="text-xl font-bold">Dashboard</h1>
        <p class="text-sm mt-1">Gestión de Restaurante</p>
        <button 
            @click="isOpen = false" 
            class="absolute top-4 right-4 text-white hover:text-gray-300"
        >
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg>
        </button>
    </div>

    <nav class="flex-1 px-4 py-6 space-y-2">
        <a href="{{ route('dashboard.index') }}" class="flex items-center py-2 px-4 rounded-lg hover:bg-green-500">
            <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000"><path d="M240-200h120v-240h240v240h120v-360L480-740 240-560v360Zm-80 80v-480l320-240 320 240v480H520v-240h-80v240H160Zm320-350Z"/></svg>
            Inicio
        </a>

        <a href="{{ route('empleados.index') }}" class="flex items-center py-2 px-4 rounded-lg hover:bg-green-500">
            <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000"><path d="M440-120v-80h320v-284q0-117-81.5-198.5T480-764q-117 0-198.5 81.5T200-484v244h-40q-33 0-56.5-23.5T80-320v-80q0-21 10.5-39.5T120-469l3-53q8-68 39.5-126t79-101q47.5-43 109-67T480-840q68 0 129 24t109 66.5Q766-707 797-649t40 126l3 52q19 9 29.5 27t10.5 38v92q0 20-10.5 38T840-249v49q0 33-23.5 56.5T760-120H440Zm-80-280q-17 0-28.5-11.5T320-440q0-17 11.5-28.5T360-480q17 0 28.5 11.5T400-440q0 17-11.5 28.5T360-400Zm240 0q-17 0-28.5-11.5T560-440q0-17 11.5-28.5T600-480q17 0 28.5 11.5T640-440q0 17-11.5 28.5T600-400Zm-359-62q-7-106 64-182t177-76q89 0 156.5 56.5T720-519q-91-1-167.5-49T435-698q-16 80-67.5 142.5T241-462Z"/></svg>
            Empleados
        </a>
        <a href="{{ route('reserva.dashboard') }}" class="flex items-center py-2 px-4 rounded-lg hover:bg-green-500">
            <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000"><path d="M400-160h160v-44l50-20q65-26 110.5-72.5T786-400H174q20 57 65 103.5T350-224l50 20v44Zm-80 80v-70q-107-42-173.5-130T80-480h80v-320l720-80v60l-460 52v68h460v60H420v160h460q0 112-66.5 200T640-150v70H320Zm0-620h40v-62l-40 5v57Zm-100 0h40v-50l-40 4v46Zm100 220h40v-160h-40v160Zm-100 0h40v-160h-40v160Zm260 80Z"/></svg>
            Reservas
        </a>
        <a href="{{ route('mesas.index') }}" class="flex items-center py-2 px-4 rounded-lg hover:bg-green-500">
            <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000"><path d="M173-600h614l-34-120H208l-35 120Zm307-60Zm192 140H289l-11 80h404l-10-80ZM160-160l49-360h-89q-20 0-31.5-16T82-571l57-200q4-13 14-21t24-8h606q14 0 24 8t14 21l57 200q5 19-6.5 35T840-520h-88l48 360h-80l-27-200H267l-27 200h-80Z"/></svg>
            Mesas
        </a>
    </nav>

    <div class="p-4 border-t border-green-700">
        <form action="{{route('auth.logout')}}" method="POST">
            @csrf
            <button 
                class="block w-full py-3 px-6 text-center rounded-md bg-gradient-to-r from-red-600 to-red-500 hover:from-red-500 hover:to-red-400 text-white font-semibold shadow-md hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-400 transition duration-300 transform hover:scale-105"
                type="submit"
            >
                Cerrar Sesión
            </button>
        </form>
    </div>
</aside>
