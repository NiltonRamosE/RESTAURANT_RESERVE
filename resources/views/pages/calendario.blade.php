@extends('layouts.default')

@section('title', 'Calendario')

@section('content')
<section class="max-w-6xl mx-auto p-6 bg-sevensoup-light shadow-md rounded-lg mt-8">
    <h2 class="text-3xl font-bold text-center mb-6 text-sevensoup-dark">Calendario de Reservas</h2>

    <div class="mb-6">
        <p class="text-lg text-center text-gray-600 mb-4">
            Selecciona una fecha para ver las reservas del día.
        </p>

        <div class="grid grid-cols-7 gap-2 mx-4">
            @php
                $startOfMonth = \Carbon\Carbon::parse($fecha)->startOfMonth();
                $daysInMonth = $startOfMonth->daysInMonth;
                $startDayOfWeek = $startOfMonth->dayOfWeek;
            @endphp

            @foreach (['Dom', 'Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb'] as $day)
                <div class="text-center font-semibold text-sevensoup-dark">{{ $day }}</div>
            @endforeach

            @for ($i = 0; $i < $startDayOfWeek; $i++)
                <div class="text-center p-2 text-gray-400"></div>
            @endfor

            @foreach (range(1, $daysInMonth) as $day)
                @php
                    $date = now()->startOfMonth()->addDays($day - 1)->format('Y-m-d');
                    $currentDay = now()->startOfMonth()->addDays($day - 1);
                @endphp
                @if ($currentDay->month == now()->month)
                    <a href="{{ route('calendario.index', ['fecha' => $date]) }}"
                       class="inline-block text-center p-2 rounded-lg 
                              {{ $currentDay->isToday() ? 'bg-sevensoup-green text-sevensoup-light' : 'bg-sevensoup-dark text-sevensoup-light' }} 
                              hover:bg-sevensoup-light hover:text-sevensoup-dark transition">
                        {{ $currentDay->day }}
                    </a>
                @else
                    <div class="text-center p-2 text-gray-400">{{ $currentDay->day }}</div>
                @endif
            @endforeach
        </div>
    </div>

    @if(isset($reservations))
        <h3 class="text-2xl font-semibold mb-4 text-sevensoup-dark">Reservas para el {{ \Carbon\Carbon::parse($fecha)->translatedFormat('d \d\e F \d\e Y') }}</h3>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md">
                <thead class="bg-sevensoup-dark text-sevensoup-light">
                    <tr>
                        <th class="px-4 py-2 text-left">Cliente</th>
                        <th class="px-4 py-2 text-left">Mesa</th>
                        <th class="px-4 py-2 text-left">Hora</th>
                        <th class="px-4 py-2 text-left">Duración</th>
                        <th class="px-4 py-2 text-left">Estado</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reservations as $reservation)
                        <tr class="border-t">
                            <td class="px-4 py-2">{{ $reservation->cliente->nombre ?? 'Sin información' }}</td>
                            <td class="px-4 py-2">{{ $reservation->mesa->numero ?? 'Sin información' }}</td>
                            <td class="px-4 py-2">{{ \Carbon\Carbon::parse($reservation->hora)->format('H:i') }}</td>
                            <td class="px-4 py-2">{{ $reservation->duracion }}</td>
                            <td class="px-4 py-2">{{ $reservation->estado }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>        
    @else
        <p class="text-center text-gray-500 mt-4">No hay reservas para esta fecha.</p>
    @endif
</section>
@endsection
