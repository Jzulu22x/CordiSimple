@extends('layouts.personal')

@section('content')
    <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">Lista de Eventos</h1>

    <!-- Botón para crear un nuevo evento, visible solo a administradores -->
    @if (Auth::user()->roles_id == 2)
        <div class="flex justify-center mb-4">
            <a href="{{ route('events.create') }}" class="bg-blue-500 p-3 text-white rounded hover:bg-blue-600">
                Nuevo evento
            </a>
        </div>
    @endif

    <!-- Contenedor para mostrar los eventos disponibles -->
    <div class="flex flex-wrap justify-center gap-6">
        @forelse ($events as $event)
            <div class="bg-white py-5 w-64 sm:w-1/2 lg:w-1/4 xl:w-1/5 cursor-pointer"> <!-- Añadir cursor-pointer para indicar que es clickeable -->
                <div class="border border-gray-200 rounded-lg shadow-sm">
                    <!-- Envolvemos toda la card en un enlace -->
                    <a href="{{ route('events.show', $event->id) }}">
                        <article class="p-4">
                            <h3 class="text-lg font-semibold text-gray-900">
                                {{ $event->name }}
                            </h3>
                            <p class="mt-2 text-sm text-gray-600 line-clamp-3">{{ ucfirst($event->description) }}</p>

                            <div class="mt-4 text-sm text-gray-500">
                                <p>Ubicación: {{ $event->location }}</p>
                                <p>Capacidad: {{ $event->people_capacity }}</p>
                                <p>Fecha: {{ $event->date_time }}</p>
                                <p>
                                    @if ($event->status_id == 1)
                                        Disponible
                                    @else
                                        No disponible
                                    @endif
                                </p>
                            </div>
                        </article>
                    </a>

                    <div class="flex justify-end items-center mt-4">
                        @if (Auth::user()->roles_id == 2)
                            <!-- Botón de eliminar para administradores -->
                            <form action="{{ route('events.destroy', $event->id) }}" method="POST" class="inline-block ml-4 event-delete-form" data-event-id="{{ $event->id }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-50 h-8 w-24 text-red-600 hover:text-red-800">Eliminar</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <div class="w-full text-center text-gray-500 py-4">No hay eventos disponibles.</div>
        @endforelse
    </div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Selecciona todos los formularios de eliminación
        const deleteForms = document.querySelectorAll('.event-delete-form');

        deleteForms.forEach(form => {
            form.addEventListener('submit', function(event) {
                event.preventDefault(); // Evitar el envío inmediato del formulario

                const eventId = this.getAttribute('data-event-id');
                Swal.fire({
                    title: "¿Estás seguro que quieres eliminar el evento " + eventId + "?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Sí, eliminar!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            title: "Eliminado!",
                            icon: "success"
                        });
                        this.submit();
                    }
                });
            });
        });
    });
</script>
