@extends('layouts.personal')

@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">Detalles del evento: {{ $event->id }}</h1>

        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="px-8 py-6">

                <div class="mb-4">
                    <h2 class="text-2xl font-bold text-gray-700 mb-2">Nombre del evento:</h2>
                    <p class="text-gray-600 text-lg capitalize">{{ $event->name }}</p>
                </div>

                <div class="mb-4">
                    <h3 class="text-xl font-bold text-gray-700 mb-2">Descripción:</h3>
                    <p class="text-gray-600 text-lg">{{ ucfirst($event->description) }}</p>
                </div>

                <div class="mb-4">
                    <h3 class="text-xl font-bold text-gray-700 mb-2">Ubicación:</h3>
                    <p class="text-gray-600 text-lg capitalize">{{ $event->location }}</p>
                </div>

                <div class="mb-4">
                    <h3 class="text-xl font-bold text-gray-700 mb-2">Fecha del evento:</h3>
                    <p class="text-gray-600 text-lg">{{ $event->date_time }}</p>
                </div>

                <div class="mb-4">
                    <h3 class="text-xl font-bold text-gray-700 mb-2">Capacidad máxima:</h3>
                    <p class="text-gray-600 text-lg">{{ $event->people_capacity }}</p>
                </div>

                <div class="mb-4">
                    <h3 class="text-xl font-bold text-gray-700 mb-2">Estado</h3>
                    <p>
                        @if ($event->status_id == 1)
                            Disponible
                        @else
                            No disponible
                        @endif
                    </p>
                </div>

                <div class="mb-4">
                    <h3 class="text-xl font-bold text-gray-700 mb-2">Creada el:</h3>
                    <p class="text-gray-600 text-lg">{{ $event->created_at->format('d-m-Y H:i:s') }}</p>
                </div>

                <div class="mb-4">
                    <h3 class="text-xl font-bold text-gray-700 mb-2">Última actualización:</h3>
                    <p class="text-gray-600 text-lg">{{ $event->updated_at->diffForHumans() }}</p>
                </div>

                <!-- Botones según el rol del usuario -->
                <div class="flex justify-end mt-6 gap-4">
                    @if (Auth::user()->roles_id == 2) <!-- Si el usuario es administrador -->
                        <a href="{{ route('events.index') }}" class="bg-gray-500 text-white px-4 py-2 h-10 rounded hover:bg-gray-600 mr-2">Volver a la lista</a>
                        <a href="{{ route('events.edit', $event->id) }}" class="bg-blue-500 text-white px-4 py-2 h-10 rounded hover:bg-blue-600 mr-2">Editar evento</a>

                        <form action="{{ route('events.destroy', $event->id) }}" id="delete" class="inline-block ml-4" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 h-10 rounded hover:bg-red-600 mr-2">Eliminar</button>
                        </form>
                    @elseif (Auth::user()->roles_id == 1) <!-- Si el usuario es regular -->
                        @php
                            // Verificar si el usuario ya tiene una reserva activa
                            $hasActiveReserve = Auth::user()->reserve()->where('event_id', $event->id)->where('status_id', 1)->exists();
                        @endphp

                        @if ($hasActiveReserve)
                            <a href="{{ route('reserves.index') }}" class="bg-green-500 px-4 py-2 h-10 text-white rounded hover:bg-green-600 mr-2">Ir a la reserva</a>
                        @elseif ($event->status_id == 1 && $event->occupied_slots < $event->people_capacity)
                            <a href="{{ route('reserves.user.create', ['event_id' => $event->id]) }}" class="bg-violet-500 text-white px-4 py-2 h-10 rounded hover:bg-violet-600 mr-2">Reservar</a>
                        @else
                            <span class="bg-yellow-500 text-white px-4 py-2 h-10 rounded cursor-not-allowed">Agotado</span>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('delete').addEventListener('submit', function(event) {
            event.preventDefault(); // Evitar el envío inmediato del formulario

            Swal.fire({
                title: "¿Estás seguro que quieres eliminar el evento?",
                showDenyButton: true,
                confirmButtonText: "Eliminar",
                denyButtonText: `Cancelar`,
                confirmButtonColor: "#d33",
                denyButtonColor: "#3085d6",
            }).then((result) => {
                if (result.isConfirmed) {
                    // Mensaje de éxito y luego enviar el formulario
                    Swal.fire("Evento eliminado con éxito!").then(() => {
                        this.submit(); // Enviar el formulario
                    });
                }
            });
        });
    });
</script>
