@extends("layouts.main")

@section("content")

    <h1>{{ $map->name }}</h1>

    <img src="{{ $map->src() }}" alt="a map">
@endsection
