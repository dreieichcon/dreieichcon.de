<?php
$faker = Faker\Factory::create();
?>

<div class="content-footer-stack">
    <div class="content-footer-row">
        <x-dc.site.footer.link
            href="https://dreieichcon.de/page/when_and_where"
            label="Veranstaltungsort"/>
        <x-dc.site.footer.divider/>
        <x-dc.site.footer.link
            href="https://buergerverein-buchschlag.de/imprint"
            label="Impressum"/>
        <x-dc.site.footer.divider/>
        <x-dc.site.footer.link
            href="https://buergerverein-buchschlag.de/privacy"
            label="Datenschutz"/>

        <?php
        $now = \Carbon\Carbon::now();
        $event = \App\Models\Event::where("start", "<", $now)
            ->where("end", ">", $now)
            ->get();

            if (count($event) > 0) {
                $e = $event->sortBy("start")->first();
            }

        ?>
        @if(isset($e))
            <x-dc.site.footer.divider/>
            {!! strip_tags($e->opening_hours) !!}
        @endif

    </div>
</div>
