<?php
$navigation = App\Models\Navigation::whereNull("parent_id")
    ->where("enabled", true)
    ->orderBy("sort")->get();
?>

<input class="menu-btn" type="checkbox" id="menu-btn" name="menu-btn"/>
<label class="nav-mobile-hamburger" for="menu-btn">
    <img
        class="socials-icon"
        src="/vendor/fontawesome-free/svg/solid/bars.svg"
        alt="menu button"
    />
</label>
<nav class="nav-mobile-menu">
    <div class="mobile-menu-stack">
        @foreach($navigation as $nav)
            @if(count($nav->children) == 0)
                <div class="mobile-nav-button">
                    <a class="mobile-nav-link" href="{{$nav -> href()}}">
                        {{$nav -> name}}
                    </a>
                </div>
            @else
                <div class="mobile-nav-header">
                    <div>
                        {{$nav -> name}}
                    </div>
                </div>
                @foreach($nav->children->sortBy("sort") as $child)
                    @if($child->enabled)
                        <div class="mobile-item">
                            <a class="mobile-sub-link" href="{{$child -> href()}}">
                                {{$child -> name}}
                            </a>
                        </div>
                    @endif
                @endforeach
                <div class="mobile-nav-separator"></div>
            @endif
        @endforeach
    </div>
</nav>

