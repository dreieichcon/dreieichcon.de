<?php

namespace App\Http\Controllers;

use App\Models\Location;

use App\Models\ProgrammLocation;
use App\Traits\Logger;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    use Logger;
    public function index()
    {
        $this->check_permission("content.programm");
        return view("admin.programm.location.index", [
            "locations" => Location::all()
        ]);
    }
    public function create()
    {
        $this->check_permission("content.programm");
        return view("admin.programm.location.form", [

        ]);
    }

    public function store(Request $request)
    {
        $this->check_permission("content.programm");
        $data = $request->validate([
            'name' => ['required'],
            'map_x' => ['nullable'],
            'map_y' => ['nullable'],
        ]);

        $location = Location::create($data);
        $location_db = [
            "name" => $location->name,
            "map_x" => $location->map_x,
            "map_y" => $location->map_y,
        ];
        $this->create_log("location", $location->id, "CREATE", $location_db);
        return redirect("/admin/location")->with("success", "Ort $location->name erfolgreich bearbeitet");
    }

    public function edit(Location $location)
    {
        $this->check_permission("content.programm");
        return view("admin.programm.location.form", [
            "location" => $location
        ]);
    }

    public function update(Request $request, Location $location)
    {
        $this->check_permission("content.programm");
        $data = $request->validate([
            'name' => ['required'],
            'map_x' => ['nullable'],
            'map_y' => ['nullable'],
        ]);

        $location->update($data);
        $changed_data = $location->getChanges();
        $this->create_log("location", $location->id, "UPDATE", $changed_data);
        return redirect("/admin/location/" . $location->id . "/edit")->with("success", "Ort $location->name erfolgreich bearbeitet");

    }

    public function destroy(Location $location)
    {
        $this->check_permission("content.programm");

        $location_name = $location->name;
        $linked_programms = array();

        //get all programms
        foreach($location->programm as $programm){

            $linked_programms["$programm->id"] = $programm->title;
        }

        //delete all Connections
        ProgrammLocation::where("location_id", $location->id)->delete();

        //log
        $this->create_log("location", $location->id, "DELETE", $linked_programms);

        //delete
        $location->delete();

        //return
        return redirect("/admin/location/")->with("success", "Ort $location_name erfolgreich gelöscht");
    }
}
