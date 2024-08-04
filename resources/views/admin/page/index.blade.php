@extends("adminlte::page")


@section("content_header")
    <h1>statische Seiten</h1>
@endsection

@section("content")

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Übersicht</h3>
                    <div class="card-tools">
                        <x-dc.admin.card.button href="/admin/page/create"/>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped dataTable">
                        <thead>
                        <tr>
                            <th>Titel</th>
                            <th>Slug</th>
                            <th></th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($pages as $page)
                            <tr>
                                <td>{{ $page->title }}</td>
                                <td>{{ $page->slug }}</td>
                                <td><x-dc.admin.edit href="/admin/page/{{$page->id}}/edit"/></td>
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
