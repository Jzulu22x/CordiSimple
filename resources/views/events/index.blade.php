@extends('layouts.main')

@section('contenido')
<div class="container mx-auto py-8">
    <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">Lista de Eventos</h1>
    <div class="flex justify-center mb-4">
        <a href="{{ route('events.create') }}" class="bg-blue-500 p-3 text-white rounded hover:bg-blue-600">Nuevo
            evento</a>
    </div>
    <div class="flex flex-wrap gap-6 justify-center">
    @forelse ($events as $event)
        <div class="bg-white rounded-lg shadow-md p-6 w-80 sm:w-64 md:w-72 lg:w-80 flex flex-col justify-between">
            <div class="mb-4">
                <h3 class="text-lg font-semibold text-gray-900 mb-2">
                    <a href="{{ route('events.show', $event->id) }}" class="hover:text-gray-600">
                        {{ $event->name }}
                    </a>
                </h3>
                <p class="text-sm text-gray-600 mb-4 line-clamp-3">{{ ucfirst($event->description) }}</p>
                <div class="text-sm text-gray-700 space-y-1">
                    <p><strong>Ubicación:</strong> {{ $event->location }}</p>
                    <p><strong>Capacidad:</strong> {{ $event->people_capacity }}</p>
                    <p><strong>Fecha:</strong> {{ $event->date_time }}</p>
                    <p>
                        <strong>Estado:</strong>
                        @if ($event->status_id == 1)
                            <span class="text-green-600">Disponible</span>
                        @else
                            <span class="text-red-600">No disponible</span>
                        @endif
                    </p>
                </div>
            </div>
            <div class="mt-4 flex justify-end">
                <form action="{{ route('events.destroy', $event->id) }}" method="POST" class="event-delete-form">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-100 text-red-600 hover:text-red-800 py-1 px-4 rounded">
                        Eliminar
                    </button>
                </form>
            </div>
        </div>
    @empty
        <p class="text-gray-500">No hay eventos disponibles.</p>
    @endforelse

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
                    title: "¿Estás seguro que quieres eliminar el evento " + eventId +
                        "?",
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
