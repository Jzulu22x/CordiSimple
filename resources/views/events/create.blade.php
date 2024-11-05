@extends('layouts.personal')

@section('content')
    <div class="container mx-auto py-8">
        <!-- Main heading for creating a new event -->
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">Crear un nuevo evento</h1>

        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <!-- Form to submit the new event data -->
            <form action="{{ route('events.store') }}" method="POST" class="px-8 py-8" id="event-create-form">
                @csrf <!-- CSRF token for security -->

                <div class="mb-4">
                    <!-- Input for the event name -->
                    <label for="name" class="block text-gray-700 font-bold mb-2">Nombre del evento:</label>
                    <input type="text" name="name" id="name"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500"
                        value="{{ old('name') }}" required>
                    <!-- Error message for the event name -->
                    @error('name')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-6">
                    <!-- Textarea for the event description -->
                    <label for="description" class="block text-gray-700 font-bold mb-2">Descripción:</label>
                    <textarea name="description" id="description"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500"
                        rows="4">{{ old('description') }}</textarea>
                    <!-- Error message for the description -->
                    @error('description')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <!-- Input for the event start date -->
                    <label for="date_time" class="block text-gray-700 font-bold mb-2">Fecha de Inicio:</label>
                    <input type="date" name="date_time" id="date_time"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500"
                        value="{{ old('date_time') }}" required>
                    <!-- Error message for the start date -->
                    @error('date_time')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <!-- Input for the event location -->
                    <label for="location" class="block text-gray-700 font-bold mb-2">Ubicación:</label>
                    <input type="text" name="location" id="location"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500"
                        value="{{ old('location') }}" required>
                    <!-- Error message for the location -->
                    @error('location')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <!-- Input for the maximum number of slots -->
                    <label for="people_capacity" class="block text-gray-700 font-bold mb-2">Número Máximo de Slots:</label>
                    <input type="number" name="people_capacity" id="people_capacity" min="1"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500"
                        value="{{ old('people_capacity') }}" required>
                    <!-- Error message for the maximum slots -->
                    @error('people_capacity')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <!-- Dropdown for selecting the event status -->
                    <label for="status" class="block text-gray-700 font-bold mb-2">Estado:</label>
                    <select name="status" id="status"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500"
                        required>
                        <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Activo</option>
                        <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Inactivo</option>
                    </select>
                    <!-- Error message for the status -->
                    @error('status')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex justify-end">
                    <!-- Button to cancel and go back to the events index -->
                    <a href="{{ route('events.index') }}"
                        class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 mr-2">Cancelar</a>
                    <!-- Button to submit the form and create the new event -->
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Crear nuevo
                        evento</button>
                </div>
            </form>
        </div>
    </div>
@endsection

<script>
    // Uncomment if needed for confirmation before form submission
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('event-create-form').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent immediate form submission

            Swal.fire({
                title: "¿Quieres agregar este nuevo evento?", // Ask for confirmation
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: "Guardar",
                denyButtonText: `No guardar`
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire("Evento agregado con éxito!", "", "success").then(() => {
                        this.submit(); // Submit the form if confirmed
                    });
                } else if (result.isDenied) {
                    Swal.fire("Se cancelo la creacion", "",
                    "info"); // Inform the user about cancellation
                }
            });
        });
    });
</script>