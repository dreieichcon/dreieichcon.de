<div class="banner-stack">
    <div class="banner-logo">
        <img class="banner-logo-img" src="/assets/resources/img/dreieichcon-logo-vislani.png"
             alt="main dreieichcon banner logo"/>
    </div>
    <a class="banner-action-link"
       @if(isset($e) && !is_null($e->ticketshop) && strlen($e->ticketshop))
           href="{{ $e->ticketshop }}"
       @else
           href="https://pretix.eu/wiric-online/"
        @endif

    >
        <img
            class="banner-action-link-img"
            src="/assets/resources/img/ticket-button.png"
            alt="Link zum Ticket-Shop"
        />
    </a>
</div>
