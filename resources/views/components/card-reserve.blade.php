<!-- tarjetas -->
@php
$displayedEvents = [];
@endphp


    <!-- mostrar eventos si es admin -->        
@forelse($reserves as $reserve)
    @if(!in_array($reserve->event->name, $displayedEvents))
        @php
            $displayedEvents[] = $reserve->event->name;
        @endphp

        <div class="flex flex-col rounded-2xl w-80 bg-[#ffffff] shadow-xl">
            <div class="flex flex-col p-8">
                <div class="text-2xl font-bold  text-[#374151] pb-6"> {{ $reserve->event->name }} </div>
                <div class=" text-base text-[#374151]"> {{ $reserve->event->description }}</div>

                <div class=" text-base text-[#919293]">Lugar del evento: {{ $reserve->event->location }}</div>

                <div class="flex gap-6 justify-center pt-6 items-center">
                    <div>
                        <a class="bg-green-500 text-white w-full font-bold text-base  p-3 rounded-lg  hover:bg-green-400 active:scale-95 transition-transform transform" href="{{ route('events.show', ['id' => $reserve->event->id]) }}">Ver más</a>
                    </div>

                    <div>
                    <form action="{{ route('reserves.destroy', ['id' => $reserve->event->id]) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas cancelar esta reserva?');">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="bg-red-500 text-white w-full font-bold text-base p-3 rounded-lg hover:bg-red-400 active:scale-95 transition-transform transform">
                            Cancelar
                        </button>
                    </form>

                    </div>
                </div>
            </div>
        </div>
    @endif
    @empty
    <p> No hay reservas </p>
@endforelse






