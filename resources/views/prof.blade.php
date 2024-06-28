@extends("layouts.main")

<?php
$faker = Faker\Factory::create();
?>

@section("content")
    <div class="content-page-title">
        Profil
    </div>
    <div class="profile-stack">
        <div class="profile-row">
            <div class="profile-image-stack">
                <div class="profile-image-resize">
                    <img class="profile-image" src="https://neu.dreieichcon.de/upload/bio_profile/img/7d0c09b3a57bfa11ec8919340a3a3852.png"/>
                </div>
                <div class="blog-post-image-copyright">
                    C {{ $faker->realText(40) }}
                </div>
            </div>
            <div class="profile-content-stack">
                <div class="profile-header-bar">
                    <div class="profile-title-stack">
                        <div class="profile-title">
                            {{ $faker->realText(20) }}
                        </div>
                        <div class="profile-subtitle">
                            {{ $faker->realText(20) }}
                        </div>
                    </div>
                    <div class="profile-socials-bar">
                        <x-dc.site.socials.item />
                        <x-dc.site.socials.item />
                        <x-dc.site.socials.item />
                    </div>
                </div>
                <div class="profile-text-divider"></div>
                <div>
                    {{ $faker -> realText(1000) }}
                </div>
            </div>
        </div>
    </div>
@endsection
