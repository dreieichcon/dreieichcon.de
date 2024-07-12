@extends("layouts.main")


@section("content")

    @dump($programm)
    @dump($programm->first()->id)
@endsection
