<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ChoosEvent</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
  
</head>

<body class="font-sans antialiased bg-gray-50 flex flex-col min-h-screen">
  <!-- Navbar -->
  <header class="bg-blue-500 text-white">
    <nav class="container mx-auto flex justify-between items-center py-4 px-6">
      <!-- Logo -->
      <div class="text-2xl font-bold text-black">ChoosEvent</div>
      <!-- Links -->
      <div class="flex space-x-4">
        <a 
          href="{{ route('login') }}" 
          class="rounded-md px-4 py-2 ring-1 ring-transparent transition focus:outline-none focus-visible:ring-[#FF2D20] hover:bg-blue-600 active:bg-blue-700 text-lg text-black">
          Login
        </a>
        <a 
          href="{{ route('register') }}" 
          class="rounded-md px-4 py-2 ring-1 ring-transparent transition focus:outline-none focus-visible:ring-[#FF2D20] hover:bg-blue-600 active:bg-blue-700 text-lg text-black">
          Register
        </a>
      </div>
    </nav>
  </header>

  <!-- Main Content -->
  <main class="justify-center flex items-center min-h-screen ">
    <div class="flex items-center justify-center">
        <div class="container mx-auto text-center py-8 ">
            <div class="justify-center flex items-center gap-8">
                <img src="logoChoosEvent.png" class="w-40 h-40">
            </div>
            <h1 class="font-bold mb-4 text-2xl">Bienvenido a ChoosEvent</h1>
            <p class="text-gray-600 text-lg">Administra tus eventos con facilidad y eficiencia.</p>
        </div>
    </div>
  </main>

  <!-- Footer -->
  <footer class="bg-blue-500 text-white text-center py-4">
    © 2024 ChoosEvent - Todos los derechos reservados.
  </footer>
</body>

<!-- <body class="font-sans antialiased dark:text-white/50">
    <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50"> -->
        <!-- <img id="background" class="absolute -left-20 top-0 max-w-[877px]" src="https://laravel.com/assets/img/welcome/background.svg" alt="Laravel background" /> -->
        <!-- <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white ">
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                <header class="grid grid-cols-2 items-center   lg:grid-cols-3 nav">
                    <div class="flex lg:justify-start mr-3 text-xl">
                        <h1 class="text-sm ml-12">ChoosEvent</h1>
                    </div>

                    <nav class=" flex text-titulo ml-11 ">


                        <a
                            href="{{ route('login') }}"
                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition fondo focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white text-lg">
                            Login
                        </a>


                        <a
                            href="{{ route('register') }}"
                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition fondo focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white text-lg">
                            Register
                        </a>

                    </nav>

                </header>

                <main class="mt-7">
                    <div class="grid gap-6 lg:grid-cols-1 lg:gap-8">
                        <a

                            class=" ancho flex flex-col items-start gap-6 overflow-hidden rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300   dark:focus-visible:ring-[#FF2D20]">
                            <div class="relative flex items-center gap-6 lg:items-end">
                                <div class="flex  gap-6 lg:flex-col">
                                    <div class=" ">
                                        <p class="text-xl text-center font-semibold">ChoosEvent</p>
                                    </div>
                                    <div class="pt-3 sm:pt-5 lg:pt-0">
                                        <p class=" text-lg/relaxed  text-center">
                                            ¿Estás buscando una manera fácil y rápida de organizar y reservar eventos? En ChoosEvent, hemos creado una solución que te permite gestionar todo el proceso sin complicaciones. Ya sea una reunión, una fiesta o un taller, nuestro software te ayudará a planificar cada detalle de manera eficiente.
                                            Con una interfaz amigable y opciones intuitivas, podrás crear y personalizar tus eventos en minutos.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a
                            class="flex items-start gap-4 rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20] fondo">
                            <div class="flex size-12 shrink-0 items-center justify-center rounded-full bg-icons sm:size-16">
                                <svg class="size-5 sm:size-6" xmlns="" fill="none" viewBox="0 0 24 24">
                                    <img src="https://static.vecteezy.com/system/resources/previews/016/314/814/non_2x/transparent-event-schedule-icon-free-png.png" alt="">
                                </svg>
                            </div>
                            <div class="relative flex items-center gap-6 lg:items-end">
                                <div class="flex  gap-6 lg:flex-col">
                                    <div class=" ">
                                        <p class="text-xl  font-semibold">Reservar Eventos</p>
                                    </div>
                                    <div class="pt-3 sm:pt-5 lg:pt-0">
                                        <p class=" text-lg/relaxed  text-center">
                                            Explora y reserva eventos con facilidad y asegura tu lugar
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a
                            class="flex items-start gap-4 rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20] fondo">
                            <div class="flex size-10 shrink-0 items-center justify-center rounded-full bg-icons sm:size-16 ">
                                <svg class="size-3 sm:size-6" xmlns="" fill="none" viewBox="0 0 24 24">
                                    <img src="https://cdn-icons-png.flaticon.com/512/5956/5956514.png" width="50px">
                                </svg>
                            </div>
                            <div class="relative flex items-center gap-6 lg:items-end">
                                <div class="flex  gap-6 lg:flex-col">
                                    <div class=" ">
                                        <p class="text-xl  font-semibold">Gestión Simplificada</p>
                                    </div>
                                    <div class="pt-3 sm:pt-5 lg:pt-0">
                                        <p class=" text-lg/relaxed  text-center">
                                            Todo en una sola plataforma para un manejo efectivo
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <div class="">
                            <div>

                                <h1 class="text-sm  topServicios  ">Servicios Ofrecidos</h1>
                            </div>
                            <div class="grid  lg:grid-cols-3 endCard ">
                                <a
                                    class="sizeCard flex items-start gap-4 rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20] fondo">
                                    <div class="flex size-10 shrink-0 items-center justify-center rounded-full bg-icons sm:size-16 ">
                                        <svg class="size-3 sm:size-6" xmlns="" fill="none" viewBox="0 0 24 24">
                                            <img src="https://w7.pngwing.com/pngs/550/671/png-transparent-computer-icons-test-event-miscellaneous-text-logo-thumbnail.png" width="55px" class="imgLeft">
                                        </svg>
                                    </div>
                                    <div class="relative flex items-center gap-6 lg:items-end">
                                        <div class="flex  gap-6 lg:flex-col">
                                            <div class=" ">
                                                <p class="text-xl  font-semibold">Organización Completa</p>
                                            </div>
                                            <div class="pt-3 sm:pt-5 lg:pt-0">
                                                <p class=" text-lg/relaxed  text-center">
                                                    Nos encargamos de todos los detalles para que tu solo disfrutes
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a
                                    class="sizeCard flex items-start gap-4 rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20] fondo">
                                    <div class="flex size-10 shrink-0 items-center justify-center rounded-full bg-icons sm:size-16 ">
                                        <svg class="size-3 sm:size-6" xmlns="" fill="none" viewBox="0 0 24 24">
                                            <img src="https://cdn-icons-png.flaticon.com/128/7600/7600136.png" width="55px" class="imgLeft">
                                        </svg>
                                    </div>
                                    <div class="relative flex items-center gap-6 lg:items-end">
                                        <div class="flex  gap-6 lg:flex-col">
                                            <div class=" ">
                                                <p class="text-xl  font-semibold">Asesoria Personalizada</p>
                                            </div>
                                            <div class="pt-3 sm:pt-5 lg:pt-0">
                                                <p class=" text-lg/relaxed  text-center">
                                                    Te ayudamos a crear el evento perfecto según tus necesidades
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a
                                    class="sizeCard flex items-start gap-4 rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20] fondo">
                                    <div class="flex size-10 shrink-0 items-center justify-center rounded-full bg-icons sm:size-16 ">
                                        <svg class="size-3 sm:size-6" xmlns="" fill="none" viewBox="0 0 24 24">
                                            <img src="https://cdn-icons-png.flaticon.com/512/675/675523.png" width="50px" class="imgLeft">
                                        </svg>
                                    </div>
                                    <div class="relative flex items-center gap-6 lg:items-end">
                                        <div class="flex  gap-6 lg:flex-col">
                                            <div class=" ">
                                                <p class="text-xl  font-semibold">Soporte Técnico</p>
                                            </div>
                                            <div class="pt-3 sm:pt-5 lg:pt-0">
                                                <p class=" text-lg/relaxed  text-center">
                                                 Asistencia durante todo el proceso de tu evento
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>

                    </div>
                </main>

                <footer class=" text-center text-sm footer">
                   ChoosEvent
                </footer>
            </div>
        </div>
    </div>
</body> -->

</html>