@extends("layouts.main")


@section("content")

    @foreach($maps as $map)
        <a href="/map/{{ $map->id }}">
            <h4>{{ $map->name }}</h4>
        <img src="{{ $map->thumb() }}" alt="a map">
        </a>
        <br>
        <hr>
        <br>
    @endforeach
@endsection
