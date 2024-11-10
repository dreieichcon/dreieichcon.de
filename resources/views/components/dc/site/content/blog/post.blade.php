<div class="{{ $class ?? "blog-post" }}">
    <div class="blog-post-image-stack">
        @if($section->image->count() > 1)
            @php($img = $section->image->first())
            <img class="blog-post-image"
                 src="{{ $img->src() }}"
                 alt="{{ $img->alt }}"
            />
            @if(isset($img->copyright) && strlen($img->copyright) > 0)
                <div class="blog-post-image-copyright">
                    &copy; {{ $img->copyright }}
                </div>
            @endif
        @endif

    </div>
    <div class="blog-post-text-stack">
        <div class="blog-post-title">
            {{ $section->h1 }}
        </div>
        <div class="blog-post-subtitle">
            {{ $section->h2 }}
        </div>
        <div class="blog-post-text-divider"></div>
        <div class="blog-post-text" id="section_body_{{$section->id}}">{{ $section->body }}</div>
        {{--            @foreach(explode("\n", $section->body) as $body)--}}
        {{--                <p>{{ $body }}</p>--}}
        {{--            @endforeach--}}


        <script>
            $(document).ready(function () {
                let body=$('#section_body_{{$section->id}}');
                body.html(DOMPurify.sanitize(marked.parse(body.html())));
            });
        </script>
    </div>
</div>
