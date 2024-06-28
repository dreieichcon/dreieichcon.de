<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DreieichCon</title>
    <link rel="stylesheet" href="/assets/css/bootstrap/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="/assets/css/fonts.css" type="text/css">
    @vite("/resources/css/main.css")
</head>

<body>
<div class="container-fluid">
    <div class="stack">

        <x-dc.site.socials.bar/>
        <x-dc.site.banner.stack/>
        <x-dc.site.nav.navbar/>

        <div class="content-scroll">
            @yield("content")
        </div>
    </div>
</div>
</body>
</html>
