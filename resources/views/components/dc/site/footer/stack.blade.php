<?php
$faker = Faker\Factory::create();
?>

<div class="content-footer-stack">
    <div class="content-footer-row">

        <x-dc.site.footer.item
                title="Veranstalter"
        >
            Jugendclub WIRIC im
            Bürgerverein Buchschlag e.V.
            Zeppelinstraße 4
            63303 Dreieich
        </x-dc.site.footer.item>

        <x-dc.site.footer.item
                title="Öffnungszeiten"
        >
            <?php
            $now = \Carbon\Carbon::now();
            $event = \App\Models\Event::where("start", "<", $now)
                ->where("end", ">", $now)
                ->get();

            if(count($event) > 0){
                $e = $event->sortBy("start")->first();
            }

            ?>
            @if(isset($e))
                {!! nl2br(strip_tags($e->opening_hours)) !!}
            @else
                noch keine Informationen
            @endif


        </x-dc.site.footer.item>

    </div>
    <div class="content-footer-row">
        <x-dc.site.footer.link
            href="https://buergerverein-buchschlag.de/imprint"
            label="Impressum" />
        <x-dc.site.footer.divider />
        <x-dc.site.footer.link
            href="https://buergerverein-buchschlag.de/privacy"
            label="Datenschutz" />
    </div>
</div>
