@extends("adminlte::page")


@section("content_header")
    <h1>Veranstaltungen</h1>
@endsection

<?php
if (!isset($event)) {
    $event = new \App\Models\Event();
    $h3 = "neue Veranstaltung anlegen";
    $action = "/admin/event";
    $patch = false;
} else {
    $h3 = "Veranstaltung $event->name anlegen";
    $action = "/admin/event/$event->id";
    $patch = true;
}
?>

@section("content")
    <div class="row">
        <div class="col-12">
            <div class="card">
                <form action="{{$action}}" method="POST">
                    @csrf
                    @if($patch)
                        @method('PATCH')
                    @endif


                    <div class="card-header">
                        <h3 class="card-title">{{ $h3 }}</h3>
                    </div>
                    <div class="card-body">
                        <x-dc.admin.form.input-new
                            :model="$event"
                            attribute="name"
                            required
                        />
                        <x-dc.admin.form.input-new
                            :model="$event"
                            attribute="year"
                            type="number"
                            inputmode="numeric"
                            required
                        />
                        <div class="row">
                            <div class="col-6">
                                <x-dc.admin.form.input-new
                                    :model="$event"
                                    attribute="start"
                                    type="datetime-local"
                                    required
                                />
                            </div>
                            <div class="col-6">
                                <x-dc.admin.form.input-new
                                    :model="$event"
                                    attribute="end"
                                    type="datetime-local"
                                    required
                                />
                            </div>
                        </div>
                        <x-dc.admin.form.textarea-new
                            :model="$event"
                            attribute="opening_hours"
                            required
                            />
                        <x-dc.admin.form.input-new
                            :model="$event"
                            attribute="theme"
                            required
                            />
                        <x-dc.admin.form.input-new
                            :model="$event"
                            attribute="ticketshop"

                            />


                    </div>
                    <div class="card-footer">
                        <x-dc.admin.form.submit/>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
