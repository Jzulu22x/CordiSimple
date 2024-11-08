<div class="container mx-auto px-2">
    <nav class="bg-white p-4 shadow-md flex items-center justify-between rounded">

        <div class="text-xl font-bold">ChoosEvent</div>
                    
        <!-- Menú de Navegación en pantallas grandes -->
        <div class="hidden md:flex md:items-center space-x-6">
            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
            </x-nav-link>

            <x-nav-link :href="route('perfil.edit', ['id' => Auth::user()->id])" :active="request()->routeIs('perfil.edit')">
                    {{ __('Perfil') }}
            </x-nav-link>

            <!-- Autenticación -->
            <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-dropdown-link>
            </form>
        </div>

        <!-- Menú hamburguesa en pantallas pequeñas -->
        <div class="md:hidden">
            <!-- Checkbox con la clase peer para activar el menú -->
            <input type="checkbox" id="menu-toggle" class="peer hidden">
            <label for="menu-toggle" class="cursor-pointer text-gray-700">
                <!-- Icono de menú hamburguesa -->
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </label>

            <!-- Menú móvil -->
            <div class="peer-checked:flex flex-col space-y-2 mt-2" id="menu-mobile">
            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
            </x-nav-link>

            <x-nav-link :href="route('perfil.edit', ['id' => Auth::user()->id])" :active="request()->routeIs('perfil.edit')">
                    {{ __('Perfil') }}
            </x-nav-link>

            <!-- Autenticación -->
            <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-dropdown-link>
            </form>
            </div>
    </nav>
</div>


