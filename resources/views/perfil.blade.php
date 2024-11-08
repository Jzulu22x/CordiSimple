@extends('layouts.mainuser')

@section('contenido')
    <p class="text-2xl font-semibold text-center"> Hola {{ Auth::user()->name }} </p>
    <h2 class="text-2xl font-semibold text-center">Actualiza tus datos</h2>
    <form method="POST" action="" class="space-y-4 needs-validation">
        @csrf 
            <!-- Name -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Nombre de usuario:</label>
                <input type="text" id="name" name="name" value="{{ Auth::user()->name }}" autofocus 
                        class="block w-full mt-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent form-control">
                @error('name')
                    <span class="invalid-feedback text-red-500 text-sm" role="alert">{{ $message }}</span>
                @enderror
            </div>

            <!-- Last Name -->
            <div>
                <label for="last_name" class="block text-sm font-medium text-gray-700">Apellido:</label>
                <input type="text" id="last_name" name="last_name" value="{{ Auth::user()->last_name }}" required 
                        class="block w-full mt-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                @error('last_name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Email Address -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Correo:</label>
                <input type="email" id="email" name="email" value="{{ Auth::user()->email }}" required 
                        class="block w-full mt-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Contraseña:</label>
                <input type="password" id="password" name="password" required 
                        class="block w-full mt-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                @error('password')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirmar Contraseña:</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required 
                        class="block w-full mt-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                @error('password_confirmation')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex items-center justify-between mt-4">
                <button type="submit" class="px-4 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none">
                    Editar
                </button>
            </div>
        </form>
@endsection