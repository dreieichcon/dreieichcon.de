@extends("adminlte::page")


@section("content_header")
    <h1>Navigation</h1>
@endsection

<?php
if(!isset($navigation)){
    $navigation = new App\Models\Navigation();
    $action = "/admin/navigation";
    $patch = false;
}else{
    $action = "/admin/navigation/$navigation->id";
    $patch  = true;
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
                        <h3 class="card-title"> neues Navigations-Element anlegen</h3>
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
                                <label class="col-form-label" for="parent">Übergeordnetes Element <small>optional</small></label>
                                <select id="parent" name="parent" class="form-control">
                                    <x-dc.admin.form.option.placeholder />
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
                    </div>
                    <div class="card-footer">
                        <x-dc.admin.form.submit />
                    </div>
                </form>
            </div>
        </div>
    </div>

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
