<li id="{{ $current }}{{ $full ?? "" }}" class="carousel-image-slide" tabindex="0">
    <div class="carousel-snapper">
        <a href="#{{ $prev }}{{ $full ?? "" }}" class="carousel-prev no-visuals"></a>
        <img class="carousel-image click-through"
             src="{{ $src }}"/>
        <a href="#{{ $next }}{{ $full ?? "" }}" class="carousel-next no-visuals"></a>
    </div>
</li>
