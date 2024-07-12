@extends("layouts.main")

@section("content")

    @dump($programm)
    @dump($programm->first()->id)

    <x-dc.site.table.main>
        <x-slot name="head">
            <x-dc.site.table.header key="title"/>
            <x-dc.site.table.header key="description_short" />
            <x-dc.site.table.header key="start" />
            <x-dc.site.table.header key="starts_in" />
            <x-dc.site.table.header key="location" />
            <x-dc.site.table.header key="type" />
        </x-slot>
        <x-slot name="body">
            @foreach($programm as $item)
                <tr>
                    <td>
                        {{ $item->title }}
                    </td>
                    <td>
                        <div style="max-width: 30vw">
                            {{ $item->description_short }}
                        </div>
                    </td>
                    <td>
                        {{ $item->start }}
                    </td>
                    <td>
                        {{ $item->start->diffForHumans() }}
                    </td>
                    <td>
                        @foreach($item->location as $location)
                            {{ $location->name }},
                        @endforeach
                    </td>
                    <td>
                        @foreach($item->type as $type)
                            {{ $type->name }},
                        @endforeach
                    </td>
                </tr>
            @endforeach
        </x-slot>
    </x-dc.site.table.main>
@endsection
