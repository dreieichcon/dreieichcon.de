<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class AdminEventController extends Controller
{
    public function index()
    {
        return view('admin.events.index', [
            'events' => Event::all()
        ]);
    }

    public function create()
    {
        return view('admin.events.form');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            "name" => "required",
            "year" => "required|numeric",
            "start" => "required",
            "end" => "required",
            "opening_hours" => "required",
            "theme"=>"required",
            "ticketshop" => "nullable"
        ]);

        $event = Event::create($data);

        return redirect("/admin/event/$event->id/edit")->with("success", "Veranstaltung angelegt");
    }



    public function edit(Event $event)
    {
        return view('admin.events.form', ["event" => $event]);
    }

    public function update(Request $request, Event $event)
    {
        $data = $request->validate([
            "name" => "required",
            "year" => "required|numeric",
            "start" => "required",
            "end" => "required",
            "opening_hours" => "required",
            "theme"=>"required",
            "ticketshop" => "nullable"
        ]);

        $event->update($data);
        return redirect("/admin/event/$event->id/edit")->with("success", "Veranstaltung bearbeitet");

    }

    public function destroy(Event $event)
    {
    }
}
