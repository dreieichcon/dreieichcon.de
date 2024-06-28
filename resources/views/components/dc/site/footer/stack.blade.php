<?php
$faker = Faker\Factory::create();
?>

<div class="content-footer-stack">
    <div class="content-footer-row">
        @for($i = 0; $i<2; $i++)
            <x-dc.site.footer.item
                title="{{ $faker->realText(20) }}"
                content="{{ $faker->realText(100) }}" />
        @endfor
    </div>
    <div class="content-footer-row">
        <x-dc.site.footer.link
            href=""
            label="{{ $faker->realText(10) }}" />
        <x-dc.site.footer.divider />
        <x-dc.site.footer.link
            href=""
            label="{{ $faker->realText(10) }}" />
    </div>
</div>
