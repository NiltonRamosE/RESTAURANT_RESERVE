@extends('layouts.default')

@section('title', 'Reservaciones de la Mesa')

@section('content')
<section class="max-w-6xl mx-auto p-6 bg-sevensoup-light shadow-md rounded-lg mt-8">
    <h2 class="text-3xl font-bold text-center mb-6 text-sevensoup-dark">Disponibilidad y Reservaciones del Día</h2>
    <p class="text-lg text-center text-gray-600 mb-8">
        {{ \Carbon\Carbon::now()->translatedFormat('l d, F \o\f Y') }}
    </p>
    
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @for ($time = \Carbon\Carbon::createFromTime(8, 0); $time <= \Carbon\Carbon::createFromTime(22, 30); $time->addMinutes(30))
            @php
                $occupiedReservation = $reservationsDateNow->first(function($reservation) use ($time) {
                    $startTime = \Carbon\Carbon::createFromTimeString($reservation->hora);
                    $endTime = $startTime->copy()->addHours($reservation->duracion_horas ?? 0);
                    return $time >= $startTime && $time < $endTime;
                });

                $isStartOfReservation = $occupiedReservation && $time->format('H:i') === \Carbon\Carbon::createFromTimeString($occupiedReservation->hora)->format('H:i');
            @endphp

            @if ($occupiedReservation && $isStartOfReservation)
            <div class="relative p-6 border rounded-lg shadow-lg bg-sevensoup-red text-sevensoup-light">
                <span class="absolute top-2 right-2 text-xs bg-sevensoup-dark text-sevensoup-light px-3 py-1 rounded-full flex items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                    No Disponible
                </span>
                <p class="font-semibold text-lg mb-2 flex items-center gap-2 mt-2">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M234-276q51-39 114-61.5T480-360q69 0 132 22.5T726-276q35-41 54.5-93T800-480q0-133-93.5-226.5T480-800q-133 0-226.5 93.5T160-480q0 59 19.5 111t54.5 93Zm246-164q-59 0-99.5-40.5T340-580q0-59 40.5-99.5T480-720q59 0 99.5 40.5T620-580q0 59-40.5 99.5T480-440Zm0 360q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q53 0 100-15.5t86-44.5q-39-29-86-44.5T480-280q-53 0-100 15.5T294-220q39 29 86 44.5T480-160Zm0-360q26 0 43-17t17-43q0-26-17-43t-43-17q-26 0-43 17t-17 43q0 26 17 43t43 17Zm0-60Zm0 360Z"/></svg>
                    {{ $occupiedReservation->cliente->nombre ?? 'Sin información' }}
                </p>
                <p class="text-sm mb-1 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" height="16px" viewBox="0 -960 960 960" width="16px" fill="#e8eaed"><path d="M320-160h320v-120q0-66-47-113t-113-47q-66 0-113 47t-47 113v120ZM160-80v-80h80v-120q0-61 28.5-114.5T348-480q-51-32-79.5-85.5T240-680v-120h-80v-80h640v80h-80v120q0 61-28.5 114.5T612-480q51 32 79.5 85.5T720-280v120h80v80H160Z"/></svg>
                    Hora: 
                    {{ \Carbon\Carbon::createFromTimeString($occupiedReservation->hora)
                        ->format('H:i')}} - 
                    {{ \Carbon\Carbon::createFromTimeString($occupiedReservation->hora)
                        ->addHours($occupiedReservation->duracion_horas ?? 0)
                        ->format('H:i') }}
                </p>
                <p class="text-sm flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" height="16px" viewBox="0 -960 960 960" width="16px" fill="#e8eaed"><path d="M360-840v-80h240v80H360Zm80 440h80v-240h-80v240Zm40 320q-74 0-139.5-28.5T226-186q-49-49-77.5-114.5T120-440q0-74 28.5-139.5T226-694q49-49 114.5-77.5T480-800q62 0 119 20t107 58l56-56 56 56-56 56q38 50 58 107t20 119q0 74-28.5 139.5T734-186q-49 49-114.5 77.5T480-80Zm0-80q116 0 198-82t82-198q0-116-82-198t-198-82q-116 0-198 82t-82 198q0 116 82 198t198 82Zm0-280Z"/></svg>
                    Duración: {{ $occupiedReservation->duracion_horas ?? 'N/A' }} horas
                </p>
            </div>
            @elseif (!$occupiedReservation)
            <div class="relative p-6 border rounded-lg shadow-lg bg-sevensoup-green text-sevensoup-dark">
                <span class="absolute top-2 right-2 text-xs bg-sevensoup-dark text-sevensoup-light px-3 py-1 rounded-full flex items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Disponible
                </span>
                <p class="font-semibold text-lg mb-2 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#ffff"><path d="m612-292 56-56-148-148v-184h-80v216l172 172ZM480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-400Zm0 320q133 0 226.5-93.5T800-480q0-133-93.5-226.5T480-800q-133 0-226.5 93.5T160-480q0 133 93.5 226.5T480-160Z"/></svg>                    {{ $time->format('H:i') }}
                </p>
                <p class="text-sm">Esta hora está libre para reservar.</p>
            </div>
            @endif
        @endfor
    </div>
</section>
@endsection
