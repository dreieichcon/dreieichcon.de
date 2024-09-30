@extends("adminlte::page")

@section("content_header")
    <h1>Social Icon</h1>
@endsection
<?php

if (isset($social)) {
    $patch = true;
    $h3 = "Social-Icon $social->plattform ändern";
    $action = "/admin/social/$social->id";
} else {
    $social = new \App\Models\Social();
    $h3 = "neues Social-Icon anlegen";
    $action = "/admin/social";
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
                            :model="$social"
                            attribute="plattform"
                            required
                        />
                        <x-dc.admin.form.input-new
                            :model="$social"
                            attribute="href"
                            required
                        />
                        <x-dc.admin.form.input-new
                            :model="$social"
                            attribute="sort"
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
        <x-dc.admin.delete_section
            action="/admin/social/{{$social->id}}"
            name="Social-Icon"
        />
    @endif



@endsection


































