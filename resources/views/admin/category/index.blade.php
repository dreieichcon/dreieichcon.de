@extends("adminlte::page")


@section("content_header")
    <h1>Kategorien</h1>
@endsection

@section("content")
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">

                    <div class="card-tools">
                        <x-dc.admin.card.button href="/admin/category/create" />
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped datatable">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Slug</th>

                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $cat)
                            <tr>
                                <td>{{ $cat->name }}</td>
                                <td>{{ $cat->slug }}</td>

                                <td><x-dc.admin.edit href="/admin/category/{{$cat->id}}/edit"/></td>
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
