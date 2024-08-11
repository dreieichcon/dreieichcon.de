@extends("adminlte::page")

@section("content_header")
    <h1>Kategorie</h1>
@endsection
<?php

if (isset($category)) {
    $patch = true;
    $h3 = "Kategorie $category->name ändern";
    $action = "/admin/category/$category->id";
} else {
    $category = new \App\Models\Category();
    $h3 = "neue Kategorie anlegen";
    $action = "/admin/category";
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
                            :model="$category"
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
        <x-dc.admin.delete_section
            name="Kategorie"
            action="/admin/category/{{$category->id}}"
            />
    @endif

@endsection


































