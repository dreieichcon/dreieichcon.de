@extends("layouts.main")


@section("content")

    @foreach($maps as $map)
        <a href="/map/{{ $map->id }}" class="map-overview-wrapper col-2">
            <h4>{{ $map->name }}</h4>
        <img src="{{ $map->src() }}" alt="a map">
        </a>
        <br>
        <hr>
        <br>
    @endforeach
@endsection
