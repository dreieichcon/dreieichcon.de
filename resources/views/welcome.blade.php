@extends("layouts.main")

<?php
$faker = Faker\Factory::create();
?>

@section("content")
    <div class="content-page-title">
        Startseite
    </div>
    <x-dc.site.content.blog.post/>
    <x-dc.site.content.main.divider/>
    <x-dc.site.content.blog.post class="blog-post-alt"/>
    <div class="content-footer-stack">
        <div class="content-footer-row">
            <div class="content-footer-item">
                <div class="content-footer-title">
                    {{ $faker->realText(20) }}
                </div>
                <div class="content-footer-text">
                    {{ $faker->realText(100) }}
                </div>
            </div>
        </div>
        <div class="content-footer-row">
            <a class="content-footer-link">Impressum</a>
        </div>
    </div>
@endsection
