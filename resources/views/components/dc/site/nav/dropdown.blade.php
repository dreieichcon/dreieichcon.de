<div class="navbar-main-dropdown-button">
    <div class="navbar-nav-link">
        {{$label}}
    </div>
    <div class="navbar-dropdown-wrapper">
        <div class="navbar-dropdown-flex">
           {!! $slot !!}

        </div>
    </div>
</div>
{{ $class ?? "" }}
