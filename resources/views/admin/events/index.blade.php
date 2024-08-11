@extends("adminlte::page")

@section("content_header")
    <h1>Veranstaltungen</h1>
@endsection

 @section("content")
     <div class="row">
         <div class="col-12">
             <div class="card">
                 <div class="card-header">
                     <div class="card-tools"><x-dc.admin.card.button href="/admin/event/create" /></div>

                 </div>
                 <div class="card-body">
                    <table class="table table-striped datatable">
                        <thead>
                        <tr>
                            <th>Event</th>
                            <th>Zeitraum</th>
                            <th>Theme</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($events as $event)
                            <tr>
                               <td>{{ $event->name }}</td>
                                <td>
                                    {{$event->start->format("d.m.Y H:i")}}
                                    bis
                                    {{$event->end->format("d.m.Y H:i") }}

                                </td>
                                <th>{{ $event->theme }}</th>
                                <td><x-dc.admin.edit href="/admin/event/{{$event->id}}/edit" /></td>
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
