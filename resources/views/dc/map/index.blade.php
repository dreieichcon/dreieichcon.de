@extends("layouts.main")


@section("content")

    <div class="map-overview-wrapper">
        @foreach($maps as $map)
            <a href="/map/{{ $map->id }}" class="map-overview-wrapper col-2">
                <h4>{{ $map->name }}</h4>
                <img src="{{ $map->src() }}" alt="a map">
            </a>
        @endforeach
    </div>
@endsection
