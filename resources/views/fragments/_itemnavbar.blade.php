<li>
    <a href="{{route('pages.menu')}}" class="block text-sevensoup-dark hover:text-sevensoup-red transition-colors font-bold">Menú</a>
</li>
<li>
    <a href="{{route('reserva.index')}}" class="block text-sevensoup-dark hover:text-sevensoup-red transition-colors font-bold">Reservas</a>
</li>
<li>
    <a href="{{route('pages.nosotros')}}" class="block text-sevensoup-dark hover:text-sevensoup-red transition-colors font-bold">Nosotros</a>
</li>

@if (session('userSession'))
<li>
    <form action="{{route('auth.logout')}}" method="POST">
        @csrf
        <button class="block text-sevensoup-dark hover:text-sevensoup-red transition-colors font-bold" type="submit">Cerrar Sesión</button>
    </form>
    
</li>
@else
<li>
    <a href="{{route('auth.index')}}" class="block text-sevensoup-dark hover:text-sevensoup-red transition-colors font-bold">Iniciar Sesión</a>
</li>
@endif