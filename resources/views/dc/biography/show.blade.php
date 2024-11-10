@extends("layouts.main")
<?php
if (!isset($biography)) {
    $biography = new \App\Models\Biography(); //code hints in IDE
}
?>

<?php
$images = $biography->images;
$header_image = $images->firstWhere("is_primary", true) ?? $images->first();

?>

@section("content")
    <div class="content-page-title">
        {{ $biography->name }}
    </div>
    <div class="profile-stack">
        <div class="profile-row">
            <div class="profile-image-stack">
                <div class="profile-image-resize">

                    @if(!is_null($header_image))
                        <img class="profile-image"
                             src="{{ $header_image->src() }}"
                             alt=" {{ $header_image->alt}}"
                        />
                    @else
                        <img class="profile-image"
                             src="{{ asset("/assets/img/no_img.png") }}"
                             alt="no image yet"

                        />
                    @endif
                </div>
                <div class="blog-post-image-copyright">
                    @if(!is_null($header_image) && !is_null($header_image->copyright) && strlen($header_image->copyright)> 0)
                        &copy; {{ $header_image->copyright }}
                    @endif
                </div>
            </div>
            <div class="profile-content-stack">
                <div class="profile-header-bar">
                    <div class="profile-title-stack">
                        <div class="profile-title">
                            {{ $biography->name }}
                        </div>
                        <div class="profile-subtitle">
                            {{ $biography->short }}
                        </div>
                    </div>
                    <div class="profile-socials-bar">
                        @foreach($biography->links as $link)
                            <x-dc.site.biography.link
                                :link="$link"
                            />
                        @endforeach
                    </div>
                </div>
                <div class="profile-text-divider"></div>
                <div class="profile-text" id="biography_long">{{ $biography->long }}</div>
                <div class="profile-text-divider"></div>
                <div class="profile-grow">

                </div>
            </div>
        </div>
        <script>
            $(document).ready(function () {
                let biography_long = $('#biography_long');
                biography_long.html(DOMPurify.sanitize(marked.parse(biography_long.html())));
            });
        </script>
        <x-dc.site.content.main.divider/>
        @if($biography->images->count() > 1)
            <div class="profile-gallery-container">
                <x-dc.site.content.gallery.carousel
                    :images="$biography->images"
                />
            </div>
        @endif
    </div>
@endsection
