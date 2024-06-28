<nav class="navbar-stack">
    <?php
        $navigation = App\Models\Navigation::whereNull("parent_id")->orderBy("sort")->get();
    ?>

    @foreach($navigation as $nav)

        @if(count($nav->children) == 0)
            <x-dc.site.nav.button
                href="{{$nav->href()}}"
                label="{{$nav->name}}"
            />
        @else
            <x-dc.site.nav.dropdown
                label="{{$nav->name}}"
            >
                @foreach($nav->children->sortBy("sort") as $child)
                    <x-dc.site.nav.dropdown-element
                    href="{{$child->href()}}"
                    label="{{$child->name}}"
                    />
                @endforeach
            </x-dc.site.nav.dropdown>
        @endif
    @endforeach

</nav>
