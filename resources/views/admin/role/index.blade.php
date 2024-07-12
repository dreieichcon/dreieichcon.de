@extends("adminlte::page")

@section("content_header")
    <h1> Rollen </h1>
@endsection
@section("content")
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-tools">
                        <x-dc.admin.card.button href="/admin/role/create" />
                    </div>

                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Rolle</th>
                            <th>Berechtigungen</th>
                            <th>Benutzer</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($roles as $role)
                            <tr>
                                <td>
                                    {{ $role->name }}
                                </td>
                                <td>
                                    <ul>
                                        @foreach($role->permissions as $permission)
                                            <li>{{ $permission->name }}</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>
                                    <ul>
                                        @foreach($role->users as $user)
                                            <li>{{ $user->name }}</li>
                                        @endforeach
                                    </ul>
                                </td>

                                <td>
                                    <a href="/admin/role/{{$role->id}}/edit"> bearbeiten </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection


