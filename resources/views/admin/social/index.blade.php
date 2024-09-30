@extends("adminlte::page")


@section("content_header")
    <h1>Social Icons</h1>
@endsection

@section("content")
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">

                    <div class="card-tools">
                        <x-dc.admin.card.button href="/admin/social/create"/>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped datatable">
                        <thead>
                        <tr>
                            <th>Sort</th>
                            <th>Icon</th>
                            <th>Link</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($socials as $social)
                            <tr>
                                <td>{{ $social->sort }}</td>
                                <td>{{ $social->plattform }} <span class="fab fa-{{ strtolower($social->plattform) }}"></span></td>
                                <td>{{ $social->href }}</td>

                                <td>
                                    <x-dc.admin.edit href="/admin/socail/{{$social->id}}/edit"/>
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
