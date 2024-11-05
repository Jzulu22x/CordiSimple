@extends('layouts.personal')

@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">Actualizar un nuevo evento</h1>

        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <form action="{{ route('events.update', $event->id) }}" method="POST" class="px-8 py-8" id="event-edit-form">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-bold mb-2">Nombre del evento:</label>
                    <input type="text" name="name" id="name"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500"
                        value="{{ old('name', $event->name) }}" required>
                    @error('name')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="description" class="block text-gray-700 font-bold mb-2">Descripción:</label>
                    <textarea name="description" id="description"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500"
                        rows="4">{{ old('description', $event->description) }}</textarea>
                    @error('description')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="date_time" class="block text-gray-700 font-bold mb-2">Fecha de Inicio:</label>
                    <input type="datetime-local" name="date_time" id="date_time"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500"
                        value="{{ old('date_time', $event->date_time) }}" required>
                    @error('date_time')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>


                <div class="mb-4">
                    <label for="location" class="block text-gray-700 font-bold mb-2">Ubicación:</label>
                    <input type="text" name="location" id="location"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500"
                        value="{{ old('location', $event->location) }}" required>
                    @error('location')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="people_capacity" class="block text-gray-700 font-bold mb-2">Número Máximo de Slots:</label>
                    <input type="number" name="people_capacity" id="people_capacity" min="1"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500"
                        value="{{ old('people_capacity', $event->people_capacity) }}" required>
                    @error('people_capacity')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="status" class="block text-gray-700 font-bold mb-2">Estado:</label>
                    <select name="status" id="status"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500"
                        required>
                        <option value="1" {{ old('status', $event->status) == 1 ? 'selected' : '' }}>Activo</option>
                        <option value="0" {{ old('status', $event->status) == 0 ? 'selected' : '' }}>Inactivo</option>
                    </select>
                    @error('status')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex justify-end">
                    <a href="{{ route('events.index') }}"
                        class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 mr-2">Cancelar</a>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Actualizar
                        evento</button>
                </div>
            </form>
        </div>
    </div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('event-edit-form').addEventListener('submit', function(event) {
            event.preventDefault();

            Swal.fire({
                title: "¿Quieres actualizar este evento?",
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: "Actualizar",
                denyButtonText: `No Actualizar`
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire("Evento actualizado con éxito!", "", "success").then(() => {
                        this.submit();
                    });
                } else if (result.isDenied) {
                    Swal.fire("Se canceló la actualización", "", "info");
                }
            });
        });
    });
</script>