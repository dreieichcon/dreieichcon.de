@extends("layouts.main")


@section("content")
    <div class="content-page-title">
        Programm
    </div>

    <div class="profile-stack">
        <div class="profile-row">

            <div class="profile-content-stack">
                <div class="profile-header-bar">
                    <div class="profile-title-stack">
                        <div class="profile-title">
                            {{ $programm->title }}
                        </div>
                        <div class="profile-subtitle">
                            {{ $programm->description_short }}
                        </div>
                    </div>
                    <div class="profile-socials-bar">
                        <div class="profile-title">
                        {{ $programm->start->format("d.m. H:i") }} @
                            @foreach($programm->location as $location)
                                {{ $location->name }}
                            @endforeach
                        </div>
                    </div>

                </div>
                <div class="profile-text-divider"></div>
                <div class="profile-text">
                    {{ $programm->description_long }}
                </div>
                <div class="profile-text-divider"></div>
                <div class="profile-grow">

                </div>
            </div>
        </div>

    </div>

@endsection
