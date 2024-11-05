@extends('layouts.personal')

@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">Actualizar Evento</h1>
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <!-- Form for updating the event, with a PUT method -->
            <form action="{{ route('events.update', $event->id) }}" method="POST" class="px-8 py-8" id="event-edit-form">
                @csrf <!-- CSRF token for security -->
                @method('PUT') <!-- Specify the HTTP method to be PUT for updating the event -->

                <!-- Event name input field -->
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-bold mb-2">Nombre del Evento:</label>
                    <input type="text" name="name" id="name"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500"
                        value="{{ old('name', $event->name) }}" required> <!-- Fill with old value or current event name -->
                    @error('name')
                        <!-- Display error message if validation fails -->
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Event description input field -->
                <div class="mb-6">
                    <label for="description" class="block text-gray-700 font-bold mb-2">Descripción:</label>
                    <textarea name="description" id="description"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500"
                        rows="4">{{ old('description', $event->description) }}</textarea> <!-- Fill with old value or current event description -->
                    @error('description')
                        <!-- Display error message if validation fails -->
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
                <!-- Event location input field -->
                <div class="mb-4">
                    <label for="location" class="block text-gray-700 font-bold mb-2">Ubicación:</label>
                    <input type="text" name="location" id="location"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500"
                        value="{{ old('location', $event->location) }}" required>
                    <!-- Fill with old value or current event location -->
                    @error('location')
                        <!-- Display error message if validation fails -->
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Maximum number of slots input field -->
                <div class="mb-4">
                    <label for="people_capacity" class="block text-gray-700 font-bold mb-2">Número Máximo de Slots:</label>
                    <input type="number" name="people_capacity" id="people_capacity" min="1"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500"
                        value="{{ old('people_capacity', $event->people_capacity) }}" required>
                    <!-- Fill with old value or current max slots -->
                    @error('people_capacity')
                        <!-- Display error message if validation fails -->
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Event status selection -->
                <div class="mb-4">
                    <!-- Dropdown for selecting the event status -->
                    <label for="status" class="block text-gray-700 font-bold mb-2">Estado:</label>
                    <select name="status" id="status"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500"
                        required>
                        <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Activo</option>
                        <option value="2" {{ old('status') == 2 ? 'selected' : '' }}>Inactivo</option>
                    </select>
                    <!-- Error message for the status -->
                    @error('status')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Form action buttons -->
                <div class="flex justify-end">
                    <a href="{{ route('events.index') }}"
                        class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 mr-2">Cancelar</a>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Actualizar
                        Evento</button>
                </div>
            </form>
        </div>
    </div>
@endsection

<script>
    // Add an event listener to the form submission
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('event-edit-form').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent immediate form submission

            // Display a confirmation dialog before submitting
            Swal.fire({
                title: "¿Quieres actualizar este evento?", // Ask for confirmation
                showDenyButton: true,
                showCancelButton: false,
                confirmButtonText: "Actualizar",
                denyButtonText: `No Actualizar`
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire("Evento actualizado con éxito!", "", "success").then(() => {
                        this.submit(); // Submit the form if confirmed
                    });
                } else if (result.isDenied) {
                    Swal.fire("Se canceló la actualización", "",
                        "info"); // Inform the user about cancellation
                }
            });
        });
    });
</script>