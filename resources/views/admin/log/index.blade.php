@extends("adminlte::page")


@section("content_header")
    <h1>Log</h1>
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
                            <th>User</th>
                            <th>Time</th>
                            <th>Table</th>
                            <th>Operation</th>
                            <th>Content</th>

                        </tr>
                        </thead>
                        <tbody>
                            @foreach($log as $l)
                                <tr>
                                    <td>{{ $l->user->name }}</td>
                                    <td>{{ $l->created_at }}</td>
                                    <td>{{ $l->table }}</td>
                                    <td>{{ $l->type }}</td>
                                    <td>
                                        @if(!is_null($l->content) && $l->content != "")

                                                    <?php

                                                    $data = json_decode($l->content);
                                                    //$data = print_r($data, true);
                                                    //$data = str_replace("\n", "<br>", $data);
                                                    /*
                                                     *                                         <div style="display:none" class="data_block" id="data_{{$l->id}}">
                                                        <pre><code>{!! $data !!}</code></pre>

                                                    </div>
                                                     */
                                                    ?>
                                                <div  class="data_block" id="data_{{$l->id}}">
                                                    <table class="table table-sm">
                                                        @foreach($data as $key => $value)
                                                            <tr>
                                                                <td>
                                                                    {{ __($key) }}
                                                                </td>
                                                                <td>
                                                                    @if(is_null($value))
                                                                        <i>NULL</i>
                                                                    @else
                                                                        {{ $value }}
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </table>
                                                </div>
                                        @endif
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
