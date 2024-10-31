<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Programm;
use App\Models\ProgrammLocation;
use App\Models\ProgrammType;
use Illuminate\Http\Request;

class AdminProgrammController extends Controller
{
    public function index()
    {
        $this->check_permission("admin.programm.index");
        $programm = Programm::all();
        return view("admin.programm.index", [
            "programms" => $programm,
        ]);
    }

    public function create()
    {
        $this->check_permission("admin.programm.create");
        return view("admin.programm.form");
    }

    public function store(Request $request)
    {
        $this->check_permission("admin.programm.store");

        $data = $request->validate([
            'title' => ['required'],
            'description_short' => ['required'],
            'description_long' => ['required'],
            'start' => ['required', 'date'],
            'end' => ['required', 'date'],
        ]);

        //todo if made aware of multiple events
        $data['event_id'] = Event::first()->id;

        $programm = Programm::create($data);

        return redirect("/admin/programm/$programm->id/edit")->with("success", "Programm wurde erstellt");
    }

    public function show(Programm $programm)
    {
        return redirect("/admin/programm/$programm->id/edit");
    }

    public function edit(Programm $programm)
    {
        $this->check_permission("admin.programm.update");
        return view("admin.programm.form", [
            "programm" => $programm,
        ]);
    }

    public function update(Request $request, Programm $programm)
    {
        $this->check_permission("admin.programm.update");
        $data = $request->validate([
            'title' => ['required'],
            'description_short' => ['required'],
            'description_long' => ['required'],
            'start' => ['required', 'date'],
            'end' => ['required', 'date'],
        ]);

        $programm->update($data);

        return redirect("/admin/programm/$programm->id/edit")->with("success", "Programm wurde bearbeitet");
    }

    public function destroy(Programm $programm)
    {
        $this->check_permission("admin.programm.destroy");
        $programm->delete();


        return redirect("/admin/programm")->with("success", "Programm wurde gelöscht");
    }

    public function addLocation(Request $request, Programm $programm)
    {
        $this->check_permission("admin.programm.update");
        $data = $request->validate([
            "id" => "required",
        ]);

        foreach ($data["id"] as $id) {
            ProgrammLocation::create([
                "programm_id" => $programm->id,
                "location_id" => $id,
            ]);
        }
        return redirect("/admin/programm/$programm->id/edit")->with("success", "Orte wurden ergänzt");
    }

    public function removeLocation(Request $request, Programm $programm)
    {
        $this->check_permission("admin.programm.update");
        $data = $request->validate([
            "id" => "required",
        ]);

        foreach ($data["id"] as $id) {
            ProgrammLocation::where([
                "programm_id" => $programm->id,
                "location_id" => $id,
            ])->delete();
        }
        return redirect("/admin/programm/$programm->id/edit")->with("success", "Orte wurden entfernt");
    }

    public function addType(Request $request, Programm $programm)
    {
        $this->check_permission("admin.programm.update");
        $data = $request->validate([
            "id" => "required",
        ]);

        foreach ($data["id"] as $id) {
            ProgrammType::create([
                "programm_id" => $programm->id,
                "type_id" => $id,
            ]);
        }
        return redirect("/admin/programm/$programm->id/edit")->with("success", "Orte wurden ergänzt");
    }

    public function removeType(Request $request, Programm $programm)
    {
        $this->check_permission("admin.programm.update");
        $data = $request->validate([
            "id" => "required",
        ]);

        foreach ($data["id"] as $id) {
            ProgrammType::where([
                "programm_id" => $programm->id,
                "type_id" => $id,
            ])->delete();
        }
        return redirect("/admin/programm/$programm->id/edit")->with("success", "Orte wurden entfernt");
    }
}
