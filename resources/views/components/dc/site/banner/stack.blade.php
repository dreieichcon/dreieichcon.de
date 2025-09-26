<?php
if (isset($e)) {
    $theme = $e->theme;

} else {
    $theme = "lightning";
}


if ($theme == "lightning") {#
    $alt = "Das Logo der Veranstaltung. Eine Elfe in der linken Bildhälfte. Rechts das Datum der Veranstaltung.";
} elseif ($theme == "ice") {
    $alt = "Das Logo der Veranstaltung. Ein Zwerg in der linken Bildhälfte. Rechts das Datum der Veranstaltung";
} else {
    $alt = "Das Logo der Veranstaltung. Ein Feuerelfe in der linken Bildhälfte. Rechts das Datum der Veranstaltung";
}
?>
<div class="banner-stack">
    <div class="banner-logo">
        <img class="banner-logo-img" src="/assets/img/logo_{{ $theme }}.png"
             alt="{{ $alt }}"/>
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
    <a class="banner-action-link-mobile"
       @if(isset($e) && !is_null($e->ticketshop) && strlen($e->ticketshop))
           href="{{ $e->ticketshop }}"
       @else
           href="https://pretix.eu/wiric-online/"
        @endif
    >
        <div>
            TICKETS KAUFEN
        </div>
    </a>
</div>
