@extends("adminlte::page")


@section("content_header")
    <h1>Navigation</h1>
@endsection

@section("content")

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">

                </div>
                <div class="card-body">
                    <x-dc.admin.nav.overview :navigation="$navigation" />
                </div>
            </div>
        </div>
    </div>

@endsection
