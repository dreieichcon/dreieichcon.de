@extends("adminlte::page")


@section("content_header")
    <h1>Programm</h1>
@endsection

@section("content")
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-tools">
                        <x-dc.admin.card.button href="/admin/programm/create" />
                    </div>

                </div>
                <div class="card-body">
                    <table class="table table-striped datatable">
                        <thead>
                        <tr>
                            <th>Zeitpunkt</th>
                            <th>Titel</th>
                            <th>Ort</th>
                            <th>Typ</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($programms as $programm)
                            <tr>
                                <td>
                                    <span style="display:none">
                                    {{ $programm->start }}
                                    </span>
                                    {{ $programm->start->format("d.m.Y H:i") }}<br>
                                    {{ $programm->start->diffForHumans() }}
                                </td>

                                <td>
                                    {{ $programm->title }}
                                </td>

                                <td>
                                    <ul>
                                        @foreach($programm->location as $location)
                                            <li>{{$location->name}}</li>
                                        @endforeach
                                    </ul>
                                </td>

                                <td>
                                    <ul>
                                        @foreach($programm->type as $type)
                                            <li>{{$type->name}}</li>
                                        @endforeach
                                    </ul>
                                </td>

                                <td>
                                    <a href="/admin/programm/{{$programm->id}}/edit"> <span class="fas fa-edit"></span> </a>
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
