
<?php
    $links = true;
    if(!isset($navigation)){
        $navigation = App\Models\Navigation::whereNull("parent_id")->orderBy("sort")->get();
        $links = false;
    }
    ?>
@if($links)
    <a href="/admin/navigation/create" class="mr-2"><span class="fas fa-plus-circle"> </span> Neues Element</a>
    @endif
    <ul>
        @foreach($navigation as $nav)
            <li>
                {{ $nav->name }}
                @if($links)
                <a href="/admin/navigation/{{$nav->id}}/edit" class="mr-1"><span class="fas fa-edit"></span></a>
                <a href="/admin/navigation/{{$nav->id}}/child_create" class="mr-2"><span class="fas fa-plus-circle"></span></a>
                @endif
                <ul>
                    @foreach($nav->children->sortBy("sort") as $child)
                        <li>
                            {{ $child->name }}
                            @if($links)
                                <a href="/admin/navigation/{{$child->id}}/edit" class="mr-1"><span class="fas fa-edit"></span></a>
                                @endif

                        </li>
                    @endforeach
                </ul>
            </li>
        @endforeach
    </ul>

