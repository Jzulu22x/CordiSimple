@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-3xl font-bold text-center text-white mb-6">Lista de Reservas</h1>

    <div class="flex justify-end mb-4">
        <a href="{{ route('reserves.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Nueva Reserva</a>
    </div>

    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="min-w-full table-auto">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Id Reserva</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estado</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Id Usuario</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre Usuario</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($reserves as $reserve)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $reserve->id }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $reserve->status->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $reserve->user->id }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $reserve->user->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <a href="{{ route('reserves.show', $reserve->id) }}" class="text-indigo-600 mr-4 hover:text-indigo-900">Detalles</a>
                            {{-- <a href="{{ route('reserves.edit', $reserve->id) }}" class="text-indigo-600 hover:text-indigo-900">Editar</a>. --}}
                            <form action="{{ route('reserves.destroy', $reserve->id) }}" method="POST" class="inline-block ml-4">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- <div class="mt-4">
        {{ $categories->links() }}
    </div> --}}
</div>
@endsection