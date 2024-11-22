<!-- sidebar -->
 <!-- Tarjeta de Usuario -->
<section class="widget locations mb-8">
    <div class="avatar mb-4 text-center">
        <img src="https://cdn-icons-png.flaticon.com/512/1057/1057231.png" alt="Avatar" class="w-24 h-24 rounded-full mx-auto" />
    </div>
    <div class="details text-center">
        <h2 class="text-xl font-semibold">{{ Auth::user()->name }}</h2>
        <p class="font-semibold">{{ Auth::user()->email }}</p>
    </div>
</section>

<!-- Menú de Navegación -->
<nav class="space-y-4">

    <x-dropdown-link :href="route('reserves.index')" :active="request()->routeIs('reserves.index')" class="block px-4 py-2 text-lg hover:bg-sky-700 active:bg-sky-700 rounded">
        {{ __('Reservas') }}
    </x-dropdown-link>

    <x-dropdown-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="block px-4 py-2 text-lg hover:bg-sky-700 active:bg-sky-700 rounded">
        {{ __('Mis reservas') }}
    </x-dropdown-link>
    
    <x-dropdown-link :href="route('events.index')" :active="request()->routeIs('events.create')" class="block px-4 py-2 text-lg hover:bg-sky-700 active:bg-sky-700 rounded">
        {{ __('Eventos') }}
    </x-dropdown-link>
    
    <x-dropdown-link :href="route('perfil.edit', ['id' => Auth::user()->id])" :active="request()->routeIs('perfil.edit')" class="block px-4 py-2 text-lg hover:bg-sky-700 active:bg-sky-700 rounded">
        {{ __('Perfil') }}
    </x-dropdown-link>


    <!-- Autenticación -->
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="block px-4 py-2 text-lg hover:bg-sky-700 active:bg-sky-700 rounded">
            {{ __('Log Out') }}
        </x-dropdown-link>
    </form>
</nav>




