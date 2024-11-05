@extends('layouts.app')

@section('content')

    <body class="bg-gray-100">
        
        <div class="bg-gray-950 max-w-lg mx-auto my-40 rounded-lg shadow-2xl p-5 ">
            <h1 class="text-center text-3xl text-white font-semibold mt-3 uppercase">Detalles de la Reserva</h1>
            <div class="flex justify-start mt-5 mb-5 ml-8">
                <h2 class="text-center text-xl text-white font-semibold mt-3">Numero de Reserva <span
                        class="ml-3 text-red-900">{{ str_pad($ReserveDetails->id, 10, '0', STR_PAD_LEFT) }}</span></h2>
            </div>
            <div class="flex justify-center mt-5 mb-2">
                <h2 class="text-center text-xl text-white font-semibold mt-3">Nombre Del Evento</h2>
            </div>
            <div class="flex justify-between w-4/5 mx-auto">
                <div class=" mt-5 mb-5">
                    <p class="text-white mx-3 ">Fecha Creacion:
                        <br><span class="text-cyan-600">{{ $ReserveDetails->created_at->format('d/m/Y H:i') }}</span>
                    </p>
                    {{-- <p class="text-cyan-600 mx-3 ">Ultima Modificacion:
                        <br>{{ $ReserveDetails->updated_at->format('d/m/Y H:i') }}</p> --}}
                    <p class="text-white mx-3 mt-5">Titular Reserva: <br>
                        <span class="text-cyan-600">{{ strtoupper($ReserveDetails->user->name) }} {{ strtoupper($ReserveDetails->user->last_name) }}</span></p>
                </div>
                <div class=" mt-5 mb-5">
                    <p class="text-white mx-3 ">Ultima Modificacion:
                        <br><span class="text-cyan-600">{{ $ReserveDetails->updated_at->format('d/m/Y H:i') }}</span>
                    </p>
                    {{-- <p class="text-cyan-600 mx-3 ">Titular Reserva: <br>{{ strtoupper($ReserveDetails->user->name) }}
                        {{ strtoupper($ReserveDetails->user->last_name) }}</p> --}}
                    <p class="text-white mx-3 mt-5">Estado: <br>
                        <span class="text-cyan-600">{{ strtoupper($ReserveDetails->status->name) }}</span></p>
                </div>
            </div>
            <div class="flex justify-end mb-2 mt-2 mr-2">
                <a href="{{ route('reserves.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Regresar</a>
            </div>
        </div>
    </body>
@endsection
