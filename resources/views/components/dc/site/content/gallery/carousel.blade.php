<div class="carousel-container">
    <input class="checkbox-hidden" type="checkbox" id="expand" style="display:none" />
    <label class="carousel-expand" for="expand"></label>
    <x-dc.site.content.gallery.carousel-logic
        :images="$images"
    />
    <div class="carousel-full hide-show">
        <label class="carousel-collapse" for="expand">
            X
        </label>
        <x-dc.site.content.gallery.carousel-logic
            :images="$images"
            full="f"
        />
    </div>
</div>
