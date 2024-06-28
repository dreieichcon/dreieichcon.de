<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DreieichCon</title>
    <link rel="stylesheet" href="/assets/css/bootstrap/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="/assets/css/fonts.css" type="text/css">
    @vite("/resources/css/main.css")
</head>

<?php
$faker = Faker\Factory::create();
?>

<body>
<div class="container-fluid">
    <div class="stack">

        <x-dc.site.socials.bar />

        <x-dc.site.banner.stack />

        <x-dc.site.nav.navbar />


        
        <div class="content-scroll">
            <div class="content-page-title">
                Startseite
            </div>
            <div class="blog-post">
                <div class="blog-post-image-stack">
                    <img class="blog-post-image" src="https://neu.dreieichcon.de/upload/blog/img/f977d0711e37df1c30608c7c9fe10821.png"/>
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
            <div class="blog-post-divider"></div>
            <div class="blog-post-alt">
                <div class="blog-post-image-stack">
                    <img class="blog-post-image" src="https://neu.dreieichcon.de/upload/blog/img/f977d0711e37df1c30608c7c9fe10821.png"/>
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
        </div>
    </div>
</div>
</body>
</html>
