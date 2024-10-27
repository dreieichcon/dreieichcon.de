@extends("adminlte::page")

@section("content_header")
    <h1>Biografien</h1>
@endsection
<?php

if (isset($biography)) {
    $patch = true;
    $h3 = "Biografie $biography->name ändern";
    $action = "/admin/biography/$biography->id";
} else {
    $biography = new \App\Models\Biography();
    $h3 = "neue Biografie anlegen";
    $action = "/admin/biography";
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
                            :model="$biography"
                            attribute="name"
                            required
                        />
                        <x-dc.admin.form.input-new
                            :model="$biography"
                            attribute="slug"
                            required
                        />
                        <x-dc.admin.form.input-new
                            :model="$biography"
                            attribute="short"
                            required
                        />
                        <x-dc.admin.form.textarea-new
                            :model="$biography"
                            attribute="long"
                            oninput="update_markdown()"
                            required
                            raw
                        />

                        <x-dc.admin.md-preview source="long"/>


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
            :all="\App\Models\Category::all()"
            :references="$biography->categories"
            sortBy="name"
            key="id"
            value="name"
            action="/admin/biography/{{$biography->id}}/category"
            label="Kategorie"
        />

        <div class="row">
            <div class="col-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Links</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Titel</th>
                                <th>Link</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($biography->links as $biolink)
                                <tr>
                                    <td><span class="{{ $biolink->icon }}"></span> {{ $biolink->name }}</td>
                                    <td><a href="{{ $biolink->href }}" target="_blank">{{ $biolink->href }}</a></td>
                                    <td>
                                        <form action="/admin/biography_link/{{$biolink->id}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"><span
                                                    class="fas fa-trash"></span></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">

                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <form action="/admin/biography/{{$biography->id}}/link_add" method="POST">
                        @csrf


                        <div class="card-header">
                            <h3 class="card-title">neuen Link anlegen</h3>
                        </div>
                        <div class="card-body">
                            <x-dc.admin.form.input
                                name="href"
                                label="Link (URL)"
                                required
                            />
                            <x-dc.admin.form.input
                                name="name"
                                label="Bezeichnung"
                                required
                            />
                            <label class="col-form-label" for="icon">Icon</label>
                            <select class="form-control" id="icon" name="icon">
                                @foreach(\App\Models\FontAwesome::where("category", "brand")->orderBy("name")->get() as $fa)
                                    <option value="{{ $fa->class }}">{{ $fa->name }}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="card-footer">
                            <x-dc.admin.form.submit/>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Bilder</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped datatable">
                            <thead>
                            <tr>
                                <th>Primary</th>
                                <th>Img</th>

                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($biography->images as $image)
                                <tr>
                                    <td>
                                        @if($image->is_primary)
                                            0<span class="fas fa-check success"></span>
                                        @else
                                            1<span class="fas fa-times danger"></span>
                                        @endif
                                    </td>
                                    <td>
                                        <img src="{{ $image->thumb() }}"
                                             alt="{{ $image->alt }}"><br>
                                        &copy; {{ $image->copyright }}<br>
                                        <i>Alt: {{ $image->alt }}</i>
                                    </td>

                                    <td>
                                        <form action="/admin/biography_image/{{ $image->id }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-warning"><span class="fas fa-trash"></span></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <form action="/admin/biography/{{ $biography->id }}/upload" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header">
                            <h3 class="card-title">neues Bild hochladen</h3>
                        </div>
                        <div class="card-body">
                            <x-dc.admin.form.input
                                name="alt"
                                label="Alternativ-Text"
                                required
                            />
                            <x-dc.admin.form.input
                                name="copyright"
                                label="Copyright (ohne (c) )"

                            />
                            <x-dc.admin.form.input
                                name="file"
                                type="file"
                                required
                            />
                            <input type="checkbox" class="form-check-inline" name="is_primary" value="1" id="is_primary"> <label class="form-check-label" for="is_primary">Hauptbild?</label>

                        </div>
                        <div class="card-footer">
                            <x-dc.admin.form.submit/>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    @endif

@endsection


































