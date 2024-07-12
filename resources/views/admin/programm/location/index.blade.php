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
                            <th>Programmpunkte</th>
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
                                    {{ $location->programm->count() }} Programmpunkte
                                    <span onclick="$('#programm_location_{{$location->id}}').toggle()" class="inline_link">
                                        anzeigen/ausblenden
                                        <span class="fa fa-caret-down"></span>
                                    </span>
                                    <table class="table table-striped table-sm" style="display:none" id="programm_location_{{$location->id}}">
                                        <thead>
                                            <tr>
                                                <th>Event</th>
                                                <th>Zeitpunkt</th>
                                                <th>Titel</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($location->programm as $programm)
                                                <tr>
                                                    <td>{{ $programm->event->name }}</td>
                                                    <td>{{ $programm->start->format("d.m.Y H:i") }}</td>
                                                    <td>{{ substr($programm->title, 0, 120) }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
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
