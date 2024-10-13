@extends("adminlte::page")


@section("content_header")
    <h1>Navigation</h1>
@endsection

<?php
if(!isset($navigation)){
    $navigation = new App\Models\Navigation();
    $action = "/admin/navigation";
    $patch = false;
    $h3 = "neues Navigationselement anlegen";
}else{
    $action = "/admin/navigation/$navigation->id";
    $patch  = true;
    $h3 = "Navigationselement $navigation->name bearbeiten";
}

?>


@section("content")

    <div class="row">
        <div class="col-12">
            <div class="card">
                <form method="POST" action="{{$action}}">
                    @csrf
                    @if($patch)
                        @method('PATCH')
                    @endif

                    <div class="card-header">
                        <h3 class="card-title"> {{ $h3 }}</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <x-dc.admin.form.input
                                    name="name"
                                    label="Name"
                                    value="{{ $navigation->name }}"
                                    required
                                />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <x-dc.admin.form.input
                                    name="sort"
                                    type="number"
                                    inputmode="numeric"
                                    label="Reihenfolge"
                                    value="{{ $navigation->sort }}"
                                    required
                                />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <label class="col-form-label" for="target_internal">interne Seite <small>optional</small></label>
                                <select id="target_internal" name="target_internal" class="form-control">
                                    <x-dc.admin.form.option.placeholder />
                                    @foreach($pages as $page)
                                        <option
                                            @if($page->id == $navigation->target_internal)
                                                selected
                                            @endif

                                            value="{{ $page->id }}">{{ $page->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <x-dc.admin.form.input
                                    name="target_external"
                                    label="externer Link"
                                    value="{{ $navigation->target_external }}"

                                />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <x-dc.admin.form.input
                                    name="target_special"
                                    label="Spezial Link"
                                    value="{{ $navigation->target_special }}"

                                />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label class="col-form-label" for="parent_id">Übergeordnetes Element <small>optional</small></label>
                                <select id="parent" name="parent_id" class="form-control">
                                    <option value="">+++ keine übergeordnete Seite +++</option>
                                    @foreach($all_navigation as $parent)
                                        <option
                                            @if($parent->id == $navigation->parent_id)
                                                selected
                                            @endif

                                            value="{{ $parent->id }}">{{ $parent->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                @php($checked = $navigation->enabled)
                               <x-dc.admin.form.icheck
                                   label="aktiv"
                                   name="enabled"
                                   checked="{{$checked}}"
                               />
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <x-dc.admin.form.submit />
                    </div>
                </form>
            </div>
        </div>
    </div>
@if($patch)
    <x-dc.admin.delete_section
    action="{{ $action }}"
    name="Navigationselement"
    />

@endif
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Aktuelle Navigation</h3>
                </div>
                <div class="card-body">
                    <x-dc.admin.nav.overview/>
                </div>
            </div>
        </div>
    </div>

@endsection
