@extends('layouts.main')

@section('contenido')
    @include('components.card-reserve', ['event' => $event])
@endsection
