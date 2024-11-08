@extends('layouts.mainuser')

@section('contenido')
<!-- Contenido de Reservas -->
<h2 class="text-xl font-bold mb-4">Tus Reservas</h2>
<div class="max-w-sm rounded overflow-hidden shadow-lg w-full">
    @foreach($reservas as $reserva)
    <p class="font-bold text-xl mb-2">The Coldest Sunset</p>
    <p class="text-gray-700 text-base">
      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, nulla! Maiores et perferendis eaque, exercitationem praesentium nihil.
    </p>
  <div class="px-6 pt-4 pb-2">
    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">Cancelar</span>
    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">Ver</span>
  </div>
</div>
@foreach($reservas as $reserva)
    <tr>
        <td class="py-2 px-4 border-b">{{ $reserva->id }}</td>
        <td class="py-2 px-4 border-b">{{ $reserva->evento }}</td>
        <td class="py-2 px-4 border-b">{{ $reserva->fecha }}</td>
        <td class="py-2 px-4 border-b">{{ $reserva->estado }}</td>
    </tr>
@endforeach



@endsection


