<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DreieichCon</title>
    <link rel="stylesheet" href="{{ asset("/assets/css/bootstrap/bootstrap.css") }}" type="text/css">
    <link rel="stylesheet" href="{{ asset("/assets/css/fonts.css") }}" type="text/css">

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
        <link rel="stylesheet" href="{{ asset("/assets/css/theme/" . $e->theme .  ".css") }}" type="text/css">
    @endif


    @vite("/resources/css/main.css")
{{--   <link rel='stylesheet' href="{{ asset("/build/assets/main-CJdvWMam.css") }}" type="text/css">--}}

    <!-- jQuery -->
    <script src="{{ asset("/assets/vendor/jquery/js/jquery-3.7.1.min.js") }}"></script>
    <!-- Marked.js and DOMpurify -->
    <script src="{{ asset("/vendor/marked/marked.js") }}"></script>
    <script src="{{ asset("/vendor/dompurify/purify.min.js") }}"></script>
</head>

<body>
<div class="container-fluid">
    <div class="stack">

        <x-dc.site.socials.bar/>
        <x-dc.site.banner.stack :e="$e"/>
        <x-dc.site.nav.navbar/>

        <div class="content-scroll">
            @yield("content")
            <x-dc.site.footer.stack />
        </div>
    </div>
</div>
</body>
</html>
