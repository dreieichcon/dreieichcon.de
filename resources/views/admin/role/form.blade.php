@extends("adminlte::page")

@section("content_header")
    <h1>Rollen</h1>
@endsection

<?php
if (isset($role)) {
    $action = "/admin/role/" . $role->id;
    $patch = true;
    $h3 = "Rolle $role->name bearbeiten";

} else {
    $role = new \App\Models\Role();
    $action = "/admin/role";
    $patch = false;
    $h3 = "neue Rolle anlegen";
}
?>

@section("content")

    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-body">
                    <form action="{{ $action }}" method="POST">
                        @csrf
                        @if($patch)
                            @method('PATCH')
                        @endif


                        <div class="row">
                            <div class="col-12">
                                <x-dc.admin.form.input
                                        name="name"
                                        label="Name"
                                        value="{{ $role->name }}"
                                        required
                                />
                            </div>
                        </div>


                        <div class="card-footer">
                            <x-dc.admin.form.submit/>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>


        @if($patch)
            <div class="row">
                <div class="col-6">
                    <div class="card">
                            <?php
                            $permissions = \App\Models\Permission::all();
                            $assigned_permissions = [];
                            ?>

                        <div class="card-body">
                            <form action="/admin/role/{{$role->id}}/permission_remove" method="POST">
                                @csrf
                                <label class="col-form-label" for="name">zugewiesene Berechtigungen</label>
                                <select multiple required name="name[]" id="name" class="form-control" size="10">
                                    @foreach($role->permissions->sortBy("name") as $permission)
                                        @php($assigned_permissions[] = $permission->name)
                                        <option value="{{ $permission->name }}">{{ $permission->name }}</option>

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
                            <form action="/admin/role/{{$role->id}}/permission_add" method="POST">
                                @csrf

                                <label class="col-form-label" for="name">verfügbare Berechtigungen</label>
                                <select multiple required name="name[]" id="name" class="form-control" size="10">
                                    @foreach($permissions->sortBy("name") as $permission)
                                        @if(!in_array($permission->name, $assigned_permissions))
                                            <option value="{{ $permission->name }}">{{ $permission->name }}</option>
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
