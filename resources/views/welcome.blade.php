@extends("layouts.main")



@section("content")
    <div class="content-page-title">
        Startseite
    </div>
    <x-dc.site.content.blog.post/>
    <x-dc.site.content.main.divider/>
    <x-dc.site.content.blog.post class="blog-post-alt"/>
@endsection
