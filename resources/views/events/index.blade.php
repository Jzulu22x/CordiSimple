@extends('layouts.personal')

@section('content')
    <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">Lista de Eventos</h1>

    <div class="flex justify-center mb-4">
        <a href="{{ route('events.create') }}" class="bg-blue-500 p-3 text-white rounded hover:bg-blue-600">Nuevo
            evento</a>
    </div>
    @forelse ($events as $event)
    <div class="flex flex-wrap justify-center"> <!-- Contenedor flexible -->
        <div class="bg-white py-5 sm:py-5 w-64 sm:w-1/2 lg:w-1/8"> <!-- Cambiar el ancho a w-1/2 -->
            <div class="mx-8">
                <div class="flex justify-evenly h-48 border-t border-gray-200">
                    <article class="flex max-w-xl flex-col items-start justify-between w-full">
                        <div class="group relative w-full h-full">
                            <h3 class="mt-3 text-lg/6 font-semibold text-gray-900 group-hover:text-gray-600">
                                <a href="{{ route('events.show', $event->id) }}">
                                    <span class="absolute inset-0"></span>
                                    {{ $event->name }}
                                </a>
                            </h3>
                            <p class="mt-5 line-clamp-3 text-sm/6 text-gray-600">{{ ucfirst($event->description) }}</p>
                            <div>
                                <p>Ubicación: {{ $event->location }}</p>
                                <p>Capacidad: {{ $event->people_capacity }}</p>
                                <p>Fecha: {{ $event->date_time }}</p>
                                <p>
                                @if ($event->status_id == 1)
                                    available
                                @else
                                    not available
                                @endif</p>
                            </div>
                            
                        </div>
                        
                    </article>
                    <div class="flex items-end">
                        <form action="{{ route('events.destroy', $event->id) }}" method="POST"
                            class="inline-block ml-4 event-delete-form" data-event-id="{{ $event->id }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-50 h-8 w-24 text-red-600 hover:text-red-800">Eliminar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@empty
    <tr>
        <td colspan="4" class="px-6 py-4 whitespace-nowrap text-center text-gray-500">No hay eventos disponibles.</td>
    </tr>
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
