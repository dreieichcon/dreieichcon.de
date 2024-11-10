@extends("adminlte::page")


@section("content_header")
    <h1>Karten</h1>
@endsection

@section("content")

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Maps</h3>
                    <div class="card-tools">
                        <x-dc.admin.card.button
                            href="/admin/map/create"
                        />
                    </div>

                </div>
                <div class="card-body">
                    <table class="table table-striped dataTable">
                        <thead>
                        <tr>
                            <th>Img</th>
                            <th>Name</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($maps as $map)
                            <tr>
                                <td><img src="{{ $map->thumb() }}" alt=" a map"></td>
                                <td>{{ $map->name }}</td>
                                <td><x-dc.admin.edit href="/admin/map/{{ $map->id }}/edit"/></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection
