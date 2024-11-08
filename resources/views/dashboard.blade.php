@extends('layouts.mainuser')

@section('contenido')
<!-- Contenido de Reservas -->
<div class="text-center">
  <h2 class="text-xl font-bold mb-4">Tus Reservas</h2>
</div>

<!-- Contenedor de tarjetas con diseño de cuadrícula -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
    @foreach($reserves as $reserve)
    <div class="rounded overflow-hidden shadow-lg w-full p-4 bg-white">
        <p class="font-bold text-xl mb-2">{{ $reserve->event->name }}</p>
        <p class="text-gray-700 text-base">
            Hola {{ Auth::user()->name }}, la reserva de tu evento está {{ $reserve->status->name }}
        </p>
        <div class="px-6 pt-4 pb-2">
            <a class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2" 
               href="{{ route('reserves.show', $reserve->id) }}">Ver reserva</a>
            <form action="{{ route('reserves.destroy', $reserve->id) }}" method="POST">
                @csrf
                <button type="submit" class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">Cancelar reserva</button>
            </form>
        </div>
    </div>
    @endforeach
</div>

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
    @php
        $displayedEvents = []; // Array para guardar nombres de eventos ya mostrados
    @endphp

    @foreach($reserves as $reserve)
        @if(!in_array($reserve->event->name, $displayedEvents))
            @php
                $displayedEvents[] = $reserve->event->name;
            @endphp

            <div class="rounded overflow-hidden shadow-lg w-full p-4 bg-white">
                <p class="font-bold text-xl mb-2">{{ $reserve->event->name }}</p>
                <p class="text-gray-700 text-base">
                    Hola {{ Auth::user()->name }}, la reserva de tu evento está {{ $reserve->status->name }}
                </p>
                <div class="px-6 pt-4 pb-2">
                    <a class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2" 
                       href="{{ route('reserves.show', $reserve->id) }}">Ver reserva</a>
                    <form action="{{ route('reserves.destroy', $reserve->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">Cancelar reserva</button>
                    </form>
                </div>
            </div>
        @endif
    @endforeach
</div>


