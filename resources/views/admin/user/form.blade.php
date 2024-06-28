@extends("adminlte::page")


@section("content_header")
    <h1>Benutzer-Verwaltung</h1>
@endsection

<?php
    if(!isset($user)){
        $user = new App\Models\User();
        $action = "/admin/user";
        $patch = false;
    }else{
        $action = "/admin/user/$user->id";
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
                    <h3 class="card-title"> neuen Benutzer anlegen</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <x-dc.admin.form.input
                                name="name"
                                label="Name"
                                required
                                />
                        </div>
                        <div class="col-6">
                            <x-dc.admin.form.input
                                name="email"
                                label="E-Mail-Adresse"
                                type="text"
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

@endsection
