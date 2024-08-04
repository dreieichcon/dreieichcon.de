<?php

namespace App\Http\Controllers;


use App\Models\Section;
use App\Models\SectionImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;

class AdminSectionController extends Controller
{
    public function index()
    {
        dump("index");
    }

    public function create()
    {
        dump("create");
    }

    public function store(Request $request)
    {
        dump("store");
        dump($request->except("_token"));

    }

    public function show(Section $section)
    {
        return redirect("/admin/section/" . $section->id . "/edit");
    }

    public function edit(Section $section)
    {

        return view("admin.section.form", [
            "section" => $section
        ]);

    }

    public function update(Request $request, Section $section)
    {
      $data = $request->validate([
          "h1" => "required",
          "h2" => "required",
          "body" => "required",
      ]);

      $section->update($data);
      return redirect("/admin/section/". $section->id)->with("success", "Seiteninhalt bearbeitet");
    }

    public function destroy(Section $section)
    {
        dump("destroy");
    }

    public function imageStore(Request $request, Section $section)
    {
        $request->validate([
            "file"  => "required",
            "alt" => "required",
            "copyright" => "nullable"
        ]);

        $data = array();
        $data['section_id'] = $section->id;
        $data['alt'] = $request['alt'];
        $data['copyright'] = $request['copyright'];

        if($request->hasFile("file")){
            $file = $request->file("file");
            $data['original_file_name'] = $file->getClientOriginalName();
            $file_type = explode(".", $data['original_file_name']);
            $file_type = strtolower($file_type[count($file_type) - 1]);

            $images = ["jpeg", "jpg", "png", "webp"];

            $gen_thumbnail = in_array($file_type, $images);

            $data['file_name'] = Str::uuid() . "." . $file_type;

            //create Entry
            $si = SectionImage::create($data);

            $path = $si->path;

            $request->file("file")->storeAs($path, $data['file_name'], 'public');

            if($gen_thumbnail){
                $image = ImageManager::gd()->read($file);
                $image->scale(width: 250);
                \Storage::disk('public')->put($path . "/thumb_" . $data['file_name'], $image->toWebp());
            }

        }

        return redirect("/admin/section/" . $section->id . "/edit")->with("success", "Bild hochgeladen");

    }
}
