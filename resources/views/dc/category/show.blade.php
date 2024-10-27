@extends("layouts.main")


@section("content")
    <div class="content-page-title">
        {{ $category->name }}
    </div>

    <div class="d-flex flex-row flex-wrap">
        @foreach($category->biographies as $bio)
            <a class="artist-card col-2" href="/biography/{{$bio->slug}}">
                <div class="artist-card-content">
                    <div class="artist-card-title">
                        <div>
                            {{ $bio->name }}
                        </div>
                   </div>
                    <div class="artist-card-image-wrapper">
                        <img class="artist-card-image"
                            src="{{ $bio->images->first()->src() }}"
                            alt="{{ $bio->images->first()->alt }}"
                        />
                    </div>
                    <div class="artist-card-footer">
                        <div>
                            {{ $bio->short }}
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
    </div>


@endsection
