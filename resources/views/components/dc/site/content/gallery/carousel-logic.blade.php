<div class="carousel-prev click-through chevron-left">
</div>
<ol class="carousel-scroll">
    @foreach($images as $img)


            <?php
                if($loop->remaining == 0){
                    $next = 0;
                }else{
                    $next = $loop->index + 1;
                }
                if($loop->index == 0){
                    $prev = $loop->count - 1;
                }else{
                    $prev = $loop->index -1;
                }

            ?>
        <x-dc.site.content.gallery.slide
            prev="{{ $prev }}"
            current="{{ $loop->index }}"
            next="{{ $next }}"
            full="{{ $full ?? null }}"
            src="{{ $img->src() }}"
        />
    @endforeach
</ol>
<div class="carousel-next click-through chevron-right"></div>
