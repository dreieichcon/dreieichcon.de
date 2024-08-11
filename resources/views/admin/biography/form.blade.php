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
                            attribute="short"
                            required
                        />
                        <x-dc.admin.form.textarea-new
                            :model="$biography"
                            attribute="long"
                            required
                            raw
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
        <x-dc.admin.twolists
            :all="\App\Models\Category::all()"
            :references="$biography->categories"
            sortBy="name"
            key="id"
            value="name"
            action="/admin/biography/{{$biography->id}}/"
            label="Kategorie"
        />
    @endif

@endsection


































