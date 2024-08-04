@extends("layouts.main")


@section("content")
    @foreach($page->sortedSections()->get() as $section)
        @if($loop->even)
            @php($class = "blog-post-alt")
        @else
            @php($class = "blog-post")
        @endif
        <x-dc.site.content.blog.post
            :section="$section"
            class="{{ $class }}"
        />
    @endforeach
@endsection
