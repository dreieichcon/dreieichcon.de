<?php

namespace App\Http\Controllers;

use App\Models\Map;
use App\Models\SectionImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;

class AdminMapController extends Controller
{
    public function index()
    {
        $this->check_permission("admin.map.create");
        $maps = Map::all();
        return view('admin.map.index', [
            'maps' => $maps
        ]);
    }

    public function create()
    {
        $this->check_permission("admin.map.create");
        return view('admin.map.form');
    }

    public function store(Request $request)
    {
        $this->check_permission("admin.map.create");
        $data = $request->validate([
            "name" => "required",
        ]);
        $map = Map::create($data);

        return redirect("/admin/map/$map->id/edit")
            ->with('success', 'Map wurde erfolgreich gespeichert.');

    }

    public function show(Map $map)
    {
        $this->check_permission("admin.map.create");
        return redirect("/admin/map/$map->id/edit");
    }

    public function edit(Map $map)
    {
        $this->check_permission("admin.map.create");
        return view('admin.map.form', [
            'map' => $map
        ]);
    }

    public function update(Request $request, Map $map)
    {
        $this->check_permission("admin.map.create");
        $data = $request->validate([
            "name" => "required",
        ]);
        $map->update($data);
        return redirect("/admin/map/$map->id/edit")
            ->with('success', 'Map wurde erfolgreich gespeichert.');

    }

    public function upload(Request $request, Map $map){
        $this->check_permission("admin.map.create");
        $request->validate([
            "file"  => "required",
            ]);
        $path = $map->path;

        if($request->hasFile("file")){

            $this->delete_files($map); //delete current files

            //upload new file

            $file = $request->file("file");
            $ofn  = $file->getClientOriginalName();
            $file_type = explode(".", $ofn);
            $file_type = strtolower($file_type[count($file_type) - 1]);

            $images = ["jpeg", "jpg", "png", "webp"];

            $gen_thumbnail = in_array($file_type, $images);

            //store in Database
            $map->original_file_name = $ofn;
            $map->file_name = Str::uuid(). ".". $file_type;
            $map->save();

            $request->file("file")->storeAs($path, $map->file_name, 'public');

            if($gen_thumbnail){
                $image = ImageManager::gd()->read($file);
                $image->scale(width: 250);
                \Storage::disk('public')->put($path . "/thumb_" . $map->file_name, $image->toWebp());
            }

        }

        return redirect("/admin/map/" . $map->id . "/edit")->with("success", "Bild hochgeladen");

    }

    public function destroy(Map $map)
    {
        $this->check_permission("admin.map.create");
        $this->delete_files($map);
        $map->delete();
        return redirect("/admin/map")
            ->with("success", "Bild entfernen");
    }

    protected function delete_files(Map $map){
        \Storage::disk("public")
            ->delete($map->path . "/" . $map->file_name);
        \Storage::disk("public")
            ->delete($map->path . "/thumb_" . $map->file_name);
    }
}
