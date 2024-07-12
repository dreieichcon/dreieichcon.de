@extends("adminlte::page")


@section("content_header")
    <h1>Veranstaltungs-Orte</h1>
@endsection

@section("content")
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-tools">
                        <x-dc.admin.card.button href="/admin/location/create" />
                    </div>

                </div>
                <div class="card-body">
                    <table class="table table-striped datatable">
                        <thead>
                        <tr>
                            <th>Name</th>

                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($locations as $location)
                            <tr>
                                <td>
                                    {{ $location->name }}
                                </td>

                                <td>
                                    <a href="/admin/location/{{$location->id}}/edit"> <span class="fas fa-edit"></span> </a>
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
