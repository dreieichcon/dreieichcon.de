@extends("adminlte::page")

<?php
if (!isset($page)) {
    $page = new \App\Models\Page();
    $action = "/admin/page";
    $h3 = "neue Seite anlegen";
    $patch = false;
} else {
    $action = "/admin/page/" . $page->id;
    $h3 = "Seite $page->title bearbeiten";
    $patch = true;
}
?>

@section("content_header")
    <h1>statische Seiten</h1>
@endsection

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
                        <div class="card-tools">
                            <a href="/page/{{$page->slug}}" target="_blank">zur öffentlichen Seite</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-8 col-md-12">
                                <x-dc.admin.form.input-new
                                    :model="$page"
                                    attribute="title"
                                    required
                                />
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <x-dc.admin.form.input-new
                                    :model="$page"
                                    attribute="slug"
                                    required
                                />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <x-dc.admin.form.input-new
                                    :model="$page"
                                    attribute="h1"
                                    required=
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
            <div class="col-lg-6 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Inhalte</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>{{ __("sort") }}</th>
                                <th>Titel</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($section_ids = array())
                            @foreach($page->section as $section)
                                @php($section_ids[] = $section->id)
                                <tr>
                                    <td>{{ $section->pivot->order }}</td>
                                    <td>{{ $section->h1 }}</td>
                                    <td class="d-flex float-right">

                                        <a href="/admin/section/{{ $section->id }}/edit" class="btn btn-sm btn-outline-primary">
                                            <span class="fas fa-edit"></span>
                                        </a>


                                        <span class="mr-2">&nbsp;</span>

                                        <form action="/admin/page/{{$page->id}}/section_unlink" method="POST">
                                            @csrf
                                            <input type="hidden" value="{{$section->id}}" name="section_id">
                                            <button type="submit" class="btn btn-sm btn-outline-warning"><span class="fas fa-link-slash"></span></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Inhalt hinzufügen</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <x-dc.admin.card.button href="/admin/page/{{$page->id}}/section_new"
                                                        label="neuen Inhalt anlegen"/>
                            </div>
                        </div>
                        <div class="row mt-2 mb-2">
                            <hr>
                        </div>
                        <form action="/admin/page/{{$page->id}}/section_add" method="POST">
                            <div class="row">
                                <div class="col-12">

                                    @csrf
                                    <select class="form-control" name="section_id" id="section_id">
                                        <x-dc.admin.form.option.placeholder/>
                                        @foreach(\App\Models\Section::all() as $section)
                                            @if(in_array($section->id, $section_ids))
                                                @continue(1)
                                            @endif
                                            <option value="{{ $section->id }}">{{ $section->h1 }}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                            <div class="row mt-1">
                                <div class="col-12">
                                    <x-dc.admin.form.submit text="vorhandenen Inhalt zuweisen"/>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
















