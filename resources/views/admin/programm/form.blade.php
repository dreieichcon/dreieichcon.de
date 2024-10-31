@extends("adminlte::page")

@section("content_header")
    <h1>Programmpunkte</h1>
@endsection
<?php

if (isset($programm)) {
    $patch = true;
    $h3 = "Programmpunkt $programm->name ändern";
    $action = "/admin/programm/$programm->id";
} else {
    $programm = new \App\Models\Biography();
    $h3 = "neuen Programmpunkt anlegen";
    $action = "/admin/programm";
    $patch = false;
}
?>

@section("content")
    <div class="row">
        <div class="col-12">
            <div class="card">
                <form action="{{ $action }}" method="POST">
                    @csrf
                    @if($patch)
                        @method('PATCH')
                    @endif

                    <div class="card-header">
                        <h3 class="card-title">{{ $h3 }}</h3>
                    </div>
                    <div class="card-body">
                        <x-dc.admin.form.input-new
                            :model="$programm"
                            attribute="title"
                            required
                        />

                        <x-dc.admin.form.input-new
                            :model="$programm"
                            attribute="description_short"
                            required
                        />
                        <x-dc.admin.form.input-new
                            :model="$programm"
                            attribute="start"
                            type="datetime-local"
                            required
                            />
                        <x-dc.admin.form.input-new
                            :model="$programm"
                            attribute="end"
                            type="datetime-local"
                            required
                        />
                        <x-dc.admin.form.textarea-new
                            :model="$programm"
                            attribute="description_long"
                            oninput="update_markdown()"
                            required
                            raw
                        />

                        <x-dc.admin.md-preview source="description_long"/>


                    </div>
                    <div class="card-footer">
                        <x-dc.admin.form.submit/>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @if($patch)
        <x-dc.admin.twolists
            :all="\App\Models\Location::all()"
            :references="$programm->location"
            sortBy="name"
            key="id"
            value="name"
            action="/admin/programm/{{$programm->id}}/location"
            label="Orte"
        />

        <x-dc.admin.twolists
            :all="\App\Models\Type::all()"
            :references="$programm->type"
            sortBy="name"
            key="id"
            value="name"
            action="/admin/programm/{{$programm->id}}/type"
            label="Programmtypen"
        />




{{--        <div class="row">--}}
{{--            <div class="col-8">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-header">--}}
{{--                        <h3 class="card-title">Bilder</h3>--}}
{{--                    </div>--}}
{{--                    <div class="card-body">--}}
{{--                        <table class="table table-striped datatable">--}}
{{--                            <thead>--}}
{{--                            <tr>--}}
{{--                                <th>Primary</th>--}}
{{--                                <th>Img</th>--}}

{{--                                <th></th>--}}
{{--                            </tr>--}}
{{--                            </thead>--}}
{{--                            <tbody>--}}
{{--                            @foreach($programm->images as $image)--}}
{{--                                <tr>--}}
{{--                                    <td>--}}
{{--                                        @if($image->is_primary)--}}
{{--                                            0<span class="fas fa-check success"></span>--}}
{{--                                        @else--}}
{{--                                            1<span class="fas fa-times danger"></span>--}}
{{--                                        @endif--}}
{{--                                    </td>--}}
{{--                                    <td>--}}
{{--                                        <img src="{{ $image->thumb() }}"--}}
{{--                                             alt="{{ $image->alt }}"><br>--}}
{{--                                        &copy; {{ $image->copyright }}<br>--}}
{{--                                        <i>Alt: {{ $image->alt }}</i>--}}
{{--                                    </td>--}}

{{--                                    <td>--}}
{{--                                        <form action="/admin/biography_image/{{ $image->id }}" method="POST">--}}
{{--                                            @method('DELETE')--}}
{{--                                            @csrf--}}
{{--                                            <button class="btn btn-warning"><span class="fas fa-trash"></span></button>--}}
{{--                                        </form>--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                            @endforeach--}}
{{--                            </tbody>--}}
{{--                        </table>--}}

{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-4">--}}
{{--                <div class="card">--}}
{{--                    <form action="/admin/biography/{{ $programm->id }}/upload" method="POST" enctype="multipart/form-data">--}}
{{--                        @csrf--}}
{{--                        <div class="card-header">--}}
{{--                            <h3 class="card-title">neues Bild hochladen</h3>--}}
{{--                        </div>--}}
{{--                        <div class="card-body">--}}
{{--                            <x-dc.admin.form.input--}}
{{--                                name="alt"--}}
{{--                                label="Alternativ-Text"--}}
{{--                                required--}}
{{--                            />--}}
{{--                            <x-dc.admin.form.input--}}
{{--                                name="copyright"--}}
{{--                                label="Copyright (ohne (c) )"--}}

{{--                            />--}}
{{--                            <x-dc.admin.form.input--}}
{{--                                name="file"--}}
{{--                                type="file"--}}
{{--                                required--}}
{{--                            />--}}
{{--                            <input type="checkbox" class="form-check-inline" name="is_primary" value="1" id="is_primary"> <label class="form-check-label" for="is_primary">Hauptbild?</label>--}}

{{--                        </div>--}}
{{--                        <div class="card-footer">--}}
{{--                            <x-dc.admin.form.submit/>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

    @endif

@endsection


































