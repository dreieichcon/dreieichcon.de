@extends("adminlte::page")


@section("content_header")
    <h1>Benutzer-Verwaltung</h1>
@endsection



@section("content")

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-tools">
                        <x-dc.admin.card.button href="/admin/user/create" />
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped datatable">
                        <thead>
                        <tr>
                            <th>Benutzer</th>
                            <th>Berechtigungen</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($user as $u)
                            <tr>
                                <td>{{ $u->name }} <br> {{ $u->email }}</td>
                                <td>
                                    Rollen<br><ul>
                                    @foreach($u->roles as $roles)
                                        <li>{{$roles->name}}</li>
                                    @endforeach
                                    </ul>
                                    direkte Berechtigungen<br><ul>

                                        @foreach($u->permissions as $perms)
                                            <li>{{$perms->name}}</li>
                                        @endforeach
                                        @if(count($u->permissions) == 0)
                                            <li><i>keine direkten Berechtigungen</i></li>
                                            @endif
                                    </ul>

                                </td>
                                <td></td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
