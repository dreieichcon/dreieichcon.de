@extends("layouts.main")

@section("content")

    <x-dc.site.table.main>
        <x-slot name="head">
            <x-dc.site.table.header key="title"/>
            <x-dc.site.table.header key="description_short"/>
            <x-dc.site.table.header key="start"/>
            <x-dc.site.table.header key="starts_in"/>
            <x-dc.site.table.header key="location"/>
            <x-dc.site.table.header key="type"/>
        </x-slot>
        <x-slot name="body">
            @foreach($programm as $item)
                <tr>
                    <td>
                        <a href="/programm/{{ $item -> id}}">
                            {{ $item->title }}
                        </a>
                    </td>
                    <td>
                        <a href="/programm/{{ $item -> id}}">
                            <div style="max-width: 30vw">
                                {{ $item->description_short }}
                            </div>
                        </a>
                    </td>
                    <td>
                        <a href="/programm/{{ $item -> id}}">
                            {{ $item->start->format("d.m. H:i") }}
                        </a>
                    </td>
                    <td>
                        <a href="/programm/{{ $item -> id}}">
                            {{ $item->start->diffForHumans() }}
                        </a>
                    </td>
                    <td>
                        <a href="/programm/{{ $item -> id}}">
                            {{ implode(', ', $item->location->pluck('name')->toArray()) }}
                        </a>
                    </td>
                    <td>
                        <a href="/programm/{{ $item -> id}}">
                            {{ implode(', ', $item->type->pluck('name')->toArray()) }}
                        </a>
                    </td>
                </tr>
            @endforeach
        </x-slot>
        <x-slot name="mobile">
            @foreach($programm as $item)
                <a class="mobile-item" href="/programm/{{ $item -> id}}">
                    <div class="mobile-header">
                        <div class="mobile-header-text">
                            {{ $item->title }}
                        </div>
                        <div class="mobile-header-tags">
                            @foreach($item->type as $type)
                                {{ $type->name }}
                            @endforeach
                        </div>
                    </div>
                    <div class="mobile-text">
                        {{ $item->description_short }}
                    </div>
                    <div class="mobile-text">
                        <div class="mobile-infos">
                            <div>
                                {{ $item -> start -> format("d.m. H:i") }} ({{ $item->start->diffForHumans() }})
                            </div>
                            <div>
                                {{ $location->name }}
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </x-slot>
    </x-dc.site.table.main>
@endsection
