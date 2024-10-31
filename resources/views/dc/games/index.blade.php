@extends("layouts.main")

@section("content_header")
    <h1>Spielrunden</h1>
@endsection

@section("content")
    <x-dc.site.table.main>
        <x-slot name="head">
            <x-dc.site.table.header key="title" width="20%"/>
            <x-dc.site.table.header key="system"/>
            <x-dc.site.table.header key="game_master"/>
            <x-dc.site.table.header key="start"/>
            <x-dc.site.table.header key="starts_in"/>
            <x-dc.site.table.header key="duration"/>
            <x-dc.site.table.header key="location"/>
            <x-dc.site.table.header key="players"/>
            <x-dc.site.table.header key="actions"/>
        </x-slot>
        <x-slot name="body">
            @foreach($games as $item)
                <tr>
                    <td>
                        <div>
                            {{ $item->title }}
                        </div>
                    </td>
                    <td>
                        <div>
                            {{ $item -> system }}
                            @if(isset($item -> system_version) && strlen($item->system_version) > 0)
                                ({{ $item -> system_version }})
                            @endif
                        </div>
                    </td>
                    <td>
                        <div>
                            @if(isset($item->alias_game_master) && strlen($item->alias_game_master)> 0)
                                {!! implode("<wbr>", preg_split('/(?=[A-Z])/', $item->alias_game_master)) !!}
                            @else
                                {!! implode("<wbr>", preg_split('/(?=[A-Z])/', $item->game_master['name'])) !!}
                            @endif
                        </div>
                    </td>
                    <td>
                        <div>
                            {{ $item -> start -> format("d.m. H:i") }}
                        </div>
                    </td>
                    <td>
                        <div>
                            {{ $item->start->diffForHumans() }}
                        </div>
                    </td>
                    <td>
                        <div>
                            {{ $item -> duration/60 }} h
                        </div>
                    </td>
                    <td>
                        <div>
                            <div>
                                {{ $item -> location }}
                                @if($item -> accessibility)
                                    <span class="fa-solid fa-wheelchair"></span>
                                @endif
                            </div>
                        </div>
                    </td>
                    <td>
                        <div>
                            {{ count($item -> player) }} / {{ $item -> player_max }}
                        </div>
                    </td>
                    <td>
                        <a class="table-link" href="https://conservices.de/game/{{ $item->conservices_id }}"
                           target="_blank"> zu
                            Conservices</a>
                    </td>
                </tr>
            @endforeach
        </x-slot>
        <x-slot name="mobile">
            @foreach($games as $item)
                <div class="mobile-item">
                    <div class="mobile-header">
                        <div class="mobile-header-text">
                            {{$item -> title}}
                        </div>
                        <div class="mobile-header-tags">
                            {{ $item -> system }}
                            @if(isset($item -> system_version) && strlen($item->system_version) > 0)
                                ({{ $item -> system_version }})
                            @endif
                        </div>
                    </div>
                    <div class="mobile-text">
                        <div>
                            {!! __("game_master") !!}:
                            @if(isset($item->alias_game_master) && strlen($item->alias_game_master)> 0)
                                {!! implode("<wbr>", preg_split('/(?=[A-Z])/', $item->alias_game_master)) !!}
                            @else
                                {!! implode("<wbr>", preg_split('/(?=[A-Z])/', $item->game_master['name'])) !!}
                            @endif
                        </div>
                        <div>
                            {!! __("duration") !!}:
                            {{ $item -> duration/60 }} h
                        </div>
                    </div>
                    <div class="mobile-text">
                        <div></div>
                        <div>
                            <a class="table-link" href="https://conservices.de/game/{{ $item->conservices_id }}"
                               target="_blank"> zu
                                Conservices</a>
                        </div>
                    </div>
                    <div class="mobile-text">
                        <div class="mobile-infos">
                            <div>
                                {{ $item -> start -> format("d.m. H:i") }}
                                ({{ $item->start->diffForHumans() }})
                            </div>
                            <div>
                                {{ $item -> location }}
                                @if($item -> accessibility)
                                    <span class="fa-solid fa-wheelchair"></span>
                                @endif
                            </div>
                            <div>
                                {!! __("players") !!}:
                                {{ count($item -> player) }} / {{ $item -> player_max }}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </x-slot>
    </x-dc.site.table.main>
@endsection
