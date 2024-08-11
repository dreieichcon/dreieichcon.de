@extends("adminlte::page")


@section("content_header")
    <h1>Biografien</h1>
@endsection

@section("content")
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">

                    <div class="card-tools">
                        <x-dc.admin.card.button href="/admin/biography/create"/>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped datatable">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Kurzbeschreibung</th>
                            <th>Links</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($biographies as $bio)
                            <tr>
                                <td>{{ $bio->name }}</td>
                                <td>{{ $bio->short }}</td>
                                <td>
                                    @if(count($bio->categories) > 0)
                                        <b>Kategorie:</b>
                                        <ul>
                                            @foreach($bio->categories as $cat)
                                                <li>{{$cat->name}}</li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </td>
                                <td>
                                    <x-dc.admin.edit href="/admin/biography/{{$bio->id}}/edit"/>
                                </td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">

                </div>
            </div>
        </div>
    </div>
@endsection
