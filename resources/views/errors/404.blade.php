@extends("layouts.main")

@section("content")
    <div class="error-wrapper">
        <div class="error-text">
            <div class="content-page-title">
                Seite nicht gefunden
            </div>
            <div>
                Die von Ihnen aufgerufene Seite konnte leider nicht gefunden werden
            </div>
        </div>
        <div class="error-image-wrapper">
            <img
                src="{{asset("/assets/resources/img/error.png")}}"
                alt="Ein kleiner Zwerg"
            >
        </div>
    </div>

@endsection
