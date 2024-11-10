@extends("adminlte::page")

@section("content_header")
    <h1>Karten</h1>
@endsection
<?php

if (isset($map)) {
    $patch = true;
    $h3 = "Karte $map->name ändern";
    $action = "/admin/map/$map->id";
} else {
    $map = new \App\Models\Map();
    $h3 = "neue Karte anlegen";
    $action = "/admin/map";
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
                            :model="$map"
                            attribute="name"
                            required
                        />


                    </div>
                    <div class="card-footer">
                        <x-dc.admin.form.submit/>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @if($patch)

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Bild</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">

                            @if(!is_null($map->original_file_name) && strlen($map->original_file_name)> 0)
                                <div class="col-lg-6 col-md-12">

                                    <img
                                        src="{{ $map->thumb() }}"
                                        alt="Karte {{ $map->name }}"
                                    />
                                </div>
                            @endif


                            <div class="col-lg-6">
                                <form action="/admin/map/{{$map->id}}/upload" method="POST"
                                      enctype="multipart/form-data">
                                    @csrf

                                    <x-dc.admin.form.input
                                        name="file"
                                        type="file"
                                        required
                                    />

                                    <x-dc.admin.form.submit/>
                                </form>


                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <x-dc.admin.delete_section
                action="/admin/map/{{$map->id}}"
                name="Karte"
            />

    @endif

@endsection


































