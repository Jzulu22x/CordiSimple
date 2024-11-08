<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ChoosEvent</title>

    <link href="css/dashboard.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">

</head>
<body class="bg-gray-100">
    <main>
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-12 gap-6 gap-4 my-4">
            <!-- Tarjeta de Usuario -->
                @include('components.componet-user')

            <!-- Menú de Navegación -->
            <div class="col-span-9">
                @include('layouts.navigation')

                 <!-- Contenido específico de cada vista -->
                <div class="w-full p-8 mt-4 mb-6 space-y-3 bg-white rounded-lg shadow-md">
                    @yield('contenido')
                </div>
            </div>
        </div>
    </div>
    </main>
    <footer>
        @include('components.footer')
    </footer>
</body>
</html>