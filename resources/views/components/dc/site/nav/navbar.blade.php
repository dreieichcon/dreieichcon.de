<nav class="navbar-stack">
    <div class="navbar-row">
    <?php
        $navigation = App\Models\Navigation::whereNull("parent_id")
            ->where("enabled", true)
            ->orderBy("sort")->get();
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
                    @if($child->enabled)
                    <x-dc.site.nav.dropdown-element
                    href="{{$child->href()}}"
                    label="{{$child->name}}"
                    />
                    @endif
                @endforeach
            </x-dc.site.nav.dropdown>
        @endif
    @endforeach
    </div>
</nav>
