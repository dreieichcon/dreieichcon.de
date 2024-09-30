<div class="socials-stack">
    <div class="socials-bar">
        @foreach(\App\Models\Social::all()->sortBy("sort") as $social)

            <x-dc.site.socials.item :social="$social"/>
        @endforeach
    </div>
</div>
