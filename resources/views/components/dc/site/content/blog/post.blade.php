<div class="{{ $class ?? "blog-post" }}">
    <div class="blog-post-image-stack">
        @if($section->image->count() > 1)
            @php($img = $section->image->first())
            <img class="blog-post-image"
                 src="{{ $img->src() }}"
                 alt="{{ $img->alt }}"
            />
            <div class="blog-post-image-copyright">
                &copy; {{ $img->copyright }}
            </div>
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
        <div class="blog-post-text">
            @foreach(explode("\n", $section->body) as $body)
                <p>{{ $body }}</p>
            @endforeach
        </div>
    </div>
</div>
