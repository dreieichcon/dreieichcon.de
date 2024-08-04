@extends("adminlte::page")

@section("content_header")
    <h1>Seiteninhalt</h1>
@endsection

<?php
$patch = false;
if (isset($page)) {
    $h3 = "neuen Inhalt für Seite $page->title";
    $section = new \App\Models\Section();
    $action = "/admin/page/$page->id/section_new";

} else {
    if (!isset($section)) {
        $section = new \App\Models\Section();
        $h3 = "neuen Inhalt anlegen";
        $action = "/admin/section";
    } else {
        $h3 = "Abschnitt $section->h1 bearbeiten";
        $action = "/admin/section/$section->id";
        $patch = true;
    }


}

?>


@section("content")
    <div class="row">
        <div class="col-12">
            <form action="{{ $action }}" method="POST">
                @csrf
                @if($patch)
                    @method('PATCH')
                @endif

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ $h3 }}</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <x-dc.admin.form.input-new
                                        :model="$section"
                                        attribute="h1"
                                        required
                                />
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <x-dc.admin.form.input-new
                                        :model="$section"
                                        attribute="h2"
                                        required
                                />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <x-dc.admin.form.textarea-new
                                        :model="$section"
                                        attribute="body"
                                        required
                                />
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <x-dc.admin.form.submit/>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @if($patch)
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"> Seiten</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Titel</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($section->page as $page)
                                <tr>
                                    <td>{{ $page->title }}</td>
                                    <td>
                                        <x-dc.admin.edit href="/admin/page/{{$page->id}}/edit"/>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Bild</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">

                            @if($section->image->count() > 1)
                                <div class="col-lg-6 col-md-12">
                                    @php($img = $section->image->first())
                                    <img
                                            src="{{ $img->thumb() }}"
                                            alt="{{ $img->alt }}"
                                    />
                                </div>

                                <div class="col-lg-6 col-md-12">
                                    <div class="row">
                                        <div class="col-12">

                                            <form action="/admin/section_image/{{$img->id}}"
                                                  method="POST">
                                                @csrf
                                                @method('PATCH')

                                                <x-dc.admin.form.input
                                                        name="alt"
                                                        label="Alternativ-Text"
                                                        value="{{ $img->alt }}"
                                                        required
                                                />
                                                <x-dc.admin.form.input
                                                        name="copyright"
                                                        label="Copyright (ohne (c) )"
                                                        value="{{ $img->copyright }}"
                                                />

                                                <x-dc.admin.form.submit/>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="col-lg-12">
                                    <x-dc.admin.section.image_form :section="$section"/>
                                    @endif


                                </div>
                        </div>

                    </div>
                </div>
            </div>

        @if(isset($img))
            <x-dc.admin.delete_section action="/admin/section_image/{{ $img->id }}" name="Bild"/>
        @endif
    @endif
@endsection
