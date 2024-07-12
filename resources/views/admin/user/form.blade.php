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


        <div class="row">
            <div class="col-6">
                <div class="card">
                        <?php
                        $roles = \App\Models\Role::all();
                        $assigned_roles = [];
                        ?>

                    <div class="card-body">
                        <form action="/admin/user/{{$user->id}}/role_remove" method="POST">
                            @csrf
                            <label class="col-form-label" for="name">zugewiesene Rollen</label>
                            <select multiple required name="name[]" id="name" class="form-control" size="10">
                                @foreach($user->roles->sortBy("name") as $role)
                                    @php($assigned_roles[] = $role->name)
                                    <option value="{{ $role->name }}">{{ $role->name }}</option>

                                @endforeach
                            </select>
                            <x-dc.admin.form.submit class="bg-info mt-2" text="Berechtigung entfernen >>>"/>
                        </form>

                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">


                    <div class="card-body">
                        <form action="/admin/user/{{$user->id}}/role_add" method="POST">
                            @csrf

                            <label class="col-form-label" for="name">verfügbare Rollen</label>
                            <select multiple required name="name[]" id="name" class="form-control" size="10">
                                @foreach($roles->sortBy("name") as $role)
                                    @if(!in_array($role->name, $assigned_roles))
                                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            <x-dc.admin.form.submit class="bg-info mt-2" text="<<< Berechtigung erteilen"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
