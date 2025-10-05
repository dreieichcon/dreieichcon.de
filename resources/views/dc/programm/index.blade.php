@extends("layouts.main")

@section("content")

    <x-dc.site.table.main>
        <x-slot name="head">
            <x-dc.site.table.header key="title"/>

            <x-dc.site.table.header key="start"/>
            <x-dc.site.table.header key="hosted_by"/>
            <x-dc.site.table.header key="location"/>
            <x-dc.site.table.header key="type"/>
        </x-slot>
        <x-slot name="body">
            @foreach($programm->sortBy("start") as $item)
                <tr>
                    <td>
                        <a href="https://conservices.de/programm/{{$item->conservices_id}}" target="_blank">
                            {{ $item->title }}
                        </a>
                    </td>
                    <td>
                        <a href="https://conservices.de/programm/{{$item->conservices_id}}" target="_blank">
                            {{ $item->start->format("d.m. H:i") }}

                            <br>
                            {{ $item->start->diffForHumans() }}
                        </a>
                    </td>
                    <td>
                        <a href="https://conservices.de/programm/{{$item->conservices_id}}" target="_blank">
                            {{ $item->host }}
                        </a>
                    </td>
                    <td>
                        <a href="https://conservices.de/programm/{{$item->conservices_id}}" target="_blank">
                            {{ $item->location }}
                        </a>
                    </td>
                    <td>
                        <a href="https://conservices.de/programm/{{$item->conservices_id}}" target="_blank">
                            {{ $item->label }}
                        </a>
                    </td>
                </tr>
            @endforeach
        </x-slot>
        <x-slot name="mobile">
            @foreach($programm as $item)
                <a class="mobile-item" href="https://conservices.de/programm/{{ $item->conservices_id}}">
                    <div class="mobile-header">
                        <div class="mobile-header-text">
                            {{ $item->title }}
                        </div>
                        <div class="mobile-header-tags">
                            {{ $item->label }}
                        </div>
                    </div>

                    <div class="mobile-text">
                        <div class="mobile-infos">
                            <div>
                                {{ $item -> start -> format("d.m. H:i") }} ({{ $item->start->diffForHumans() }})
                            </div>
                            <div>
                                {{$item->location}}
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </x-slot>
    </x-dc.site.table.main>
@endsection
