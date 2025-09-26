<div class="socials-stack">
    <x-dc.site.navmobile.hamburger></x-dc.site.navmobile.hamburger>
    <div class="socials-bar">
        @foreach(\App\Models\Social::all()->sortBy("sort") as $social)
            <x-dc.site.socials.item :social="$social"/>
        @endforeach
    </div>
</div>
