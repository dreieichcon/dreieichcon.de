<div class="carousel-prev click-through chevron-left">
</div>
<ol class="carousel-scroll">
    @for($i=0; $i < 5; $i++)
        @if($i % 2 == 0)
        <x-dc.site.content.gallery.slide
            prev="{{ $i - 1 }}"
            current="{{ $i }}"
            next="{{ $i + 1 }}"
            full="{{ $full ?? null }}"
            src="https://neu.dreieichcon.de/upload/bio_profile/img/7d0c09b3a57bfa11ec8919340a3a3852.png"/>
        @else
        <x-dc.site.content.gallery.slide
            prev="{{ $i - 1 }}"
            current="{{ $i }}"
            next="{{ $i + 1 }}"
            full="{{ $full ?? null }}"
            src="https://neu.dreieichcon.de/upload/bio_profile/img/b587987df6b353c6e732d440149d6a9c.png"  />
        @endif
    @endfor
</ol>
<div class="carousel-next click-through chevron-right"></div>
