@extends("adminlte::page")

@section("content_header")
    <h1>Spielrunden</h1>
@endsection

@section("content")
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">


                </div>
                <div class="card-body">
                    <table class="table table-striped datatable">
                        <thead>
                        <tr>
                            <th>Titel</th>
                            <th>System</th>
                            <th>Spielleitung</th>
                            <th>Start</th>
                            <th>Dauer</th>
                            <th>Spieler</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($games as $game)
                            <tr>
                                <td>{{ $game->title }}</td>
                                <td>{{ $game->system }} {{ $game->system_version }}</td>
                                <td>
                                    @if(isset($game->alias_game_master) && strlen($game->alias_game_master)> 0)
                                        {{ $game->alias_game_master }}
                                    @else
                                        {{ $game->game_master['name'] }}
                                    @endif
                                </td>

                                <td>
                                    {{ $game->start->format("d.m. H:i") }}<br>
                                    {{ $game->start->diffForHumans() }}
                                </td>
                                <td>{{$game->duration}} minutes</td>
                                <td>{{ count($game->player) }} / {{ $game->player_max }}</td>
                                <td></td>
                                <td><a href="https://conservices.de/game/{{ $game->conservices_id }}" target="_blank"> Open on conservices.de</a></td>

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
