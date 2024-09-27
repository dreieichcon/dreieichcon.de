
<?php
$links = true;
if (!isset($navigation)) {
    $navigation = App\Models\Navigation::whereNull("parent_id")->orderBy("sort")->get();
    $links = false;
}
?>
@if($links)
    <a href="/admin/navigation/create" class="mr-2"><span class="fas fa-plus-circle"> </span> Neues Element</a>
@endif
<ul>
    @foreach($navigation as $nav)
        <li
        @if(!$nav->enabled)
        class="item_disabled"
            @endif
        >
            {{ $nav->name }}
            @if($links)
                <a href="/admin/navigation/{{$nav->id}}/edit" class="mr-1"><span class="fas fa-edit"></span></a>
                <a href="/admin/navigation/{{$nav->id}}/child_create" class="mr-2"><span
                        class="fas fa-plus-circle"></span></a>
            @endif
{{--            <span style="font-family: monospace; background-color: #aaaaaa">Internal: {{ $nav->target_internal }}</span>--}}
{{--            <span style="font-family: monospace; background-color: #aaaaaa">External: {{ $nav->target_external }}</span>--}}
{{--            <span style="font-family: monospace; background-color: #aaaaaa">Special: {{ $nav->target_special }}</span>--}}
            <span style="font-family: monospace; background-color: #666666">{{ $nav->href() }}</span>
            <ul>
                @foreach($nav->children->sortBy("sort") as $child)
                    <li>
                        {{ $child->name }}
                        @if($links)
                            <a href="/admin/navigation/{{$child->id}}/edit" class="mr-1"><span
                                    class="fas fa-edit"></span></a>
                        @endif

                        <span style="font-family: monospace; background-color: #666666">{{ $child->href() }}</span>

                    </li>
                    <x-dc.admin.edit
                @endforeach
            </ul>
        </li>
    @endforeach
</ul>

