@extends("adminlte::page")


@section("content_header")
    <h1>Benutzer-Verwaltung</h1>
@endsection

<?php
    if(!isset($user)){
        $user = new App\Models\User();
        $action = "/admin/user";
        $patch = false;
        $h3 = "neuen Benutzer anlegen";
    }else{
        $action = "/admin/user/$user->id";
        $patch  = true;
        $h3 = "Benutzer $user->name bearbeiten";
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
                        <div class="col-6">
                            <x-dc.admin.form.input
                                name="name"
                                label="Name"
                                value="{{ $user->name }}"
                                required
                                />
                        </div>
                        <div class="col-6">
                            <x-dc.admin.form.input
                                name="email"
                                label="E-Mail-Adresse"
                                type="email"
                                value="{{ $user->email }}"
                                required
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
        <x-dc.admin.twolists
            :all="\App\Models\Role::all()"
            :references="$user->roles"
            sortBy="name"
            key="name"
            value="name"
            action="/admin/user/{{$user->id}}/role"
            label="Berechtigung"
        />


    @endif
@endsection
