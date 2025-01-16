<li>
    <a href="{{route('pages.menu')}}" class="block text-sevensoup-dark hover:text-sevensoup-red transition-colors font-bold">Menú</a>
</li>
<li>
    <a href="{{route('reserva.index')}}" class="block text-sevensoup-dark hover:text-sevensoup-red transition-colors font-bold">Reservas</a>
</li>
<li>
    <a href="{{route('pages.nosotros')}}" class="block text-sevensoup-dark hover:text-sevensoup-red transition-colors font-bold">Nosotros</a>
</li>

@auth('usuarios')
<li>
    <form action="{{route('auth.logout')}}" method="POST">
        @csrf
        <button class="block text-sevensoup-dark hover:text-sevensoup-red transition-colors font-bold" type="submit">Cerrar Sesión</button>
    </form>
    
</li>
@endauth

@guest('usuarios')
<li>
    <a href="{{route('auth.index')}}" class="block text-sevensoup-dark hover:text-sevensoup-red transition-colors font-bold">Iniciar Sesión</a>
</li>
@endguest