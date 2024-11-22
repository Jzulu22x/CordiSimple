<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'ChoosEvent') }}</title>

        <!-- Fonts -->
        <link href="css/dashboard.css" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    </head>
<body class="bg-gray-100 min-h-screen">
    <main class="flex min-h-screen">
        <!-- sidebar -->
        <div class="w-1/5 bg-gray-400 text-white p-7 shadow-md rounded">
            @include('layouts.navigation')
        </div>

        <!-- Contenido principal -->
        <div class="w-3/4 p-4">
            <div class="bg-white p-4 shadow-md rounded text-xl font-bold mb-4 flex gap-6 justify-between">
                <div class="flex items-center gap-4">
                    <img src="logoChoosEvent.png" class="w-12 h-12">
                    <h2>ChoosEvent</h2>
                </div>
                <div>
                  <!-- Autenticación -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="block px-4 py-2 text-lg hover:bg-sky-700 active:bg-sky-700 rounded">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                </div>
            </div>
            <div class="flex flex-col md:flex-row gap-6 justify-betwee roudend">
                @yield('contenido')
            </div>
        </div>
    </main>
</body>
</html>