<?php
$faker = Faker\Factory::create();
?>

<div class="{{ $class ?? "blog-post" }}">
    <div class="blog-post-image-stack">
        <img class="blog-post-image"
             src="https://neu.dreieichcon.de/upload/blog/img/f977d0711e37df1c30608c7c9fe10821.png"/>
        <div class="blog-post-image-copyright">
            C {{ $faker->realText(40) }}
        </div>
    </div>
    <div class="blog-post-text-stack">
        <div class="blog-post-title">
            {{ $faker->realText(20) }}
        </div>
        <div class="blog-post-subtitle">
            {{ $faker->realText(30) }}
        </div>
        <div class="blog-post-text-divider"></div>
        <div class="blog-post-text">
            {{ $faker->realText(1000) }}
        </div>
    </div>
</div>
