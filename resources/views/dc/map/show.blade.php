@extends("layouts.main")

@section("content")
    <div class="map-title-row">
        <h3>{{ $map->name }}</h3>
        <div class="map-info">Karte ist mit Maus und Mausrad verschieb- und zoombar.</div>
        <div class="map-buttons">
            <div class="map-reset" id="reset">Reset</div>
            <a href="/map" class="map-reset">Zurück zu allen Karten</a>
        </div>
    </div>


    <div class="map-wrapper">
        <div class="panzoom" id="panzoom">
            <img src="{{ $map->src() }}" alt="a map">
        </div>
    </div>

    @vite("resources/js/panzoom.js")

@endsection
