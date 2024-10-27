<?php

namespace App\Http\Controllers;

use App\Models\Biography;
use App\Models\BiographyImage;
use App\Models\SectionImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;

class BiographyImageController extends Controller
{
    public function upload(Request $request, Biography $biography)
    {
        $this->check_permission("biography.image.upload");
        $request->validate([
            "file" => "required",
            "alt" => "required",
            "copyright" => "nullable",
            "is_primary" => "nullable",

        ]);

        $data = array();
        $data['biography_id'] = $biography->id;
        $data['alt'] = $request['alt'];
        $data['copyright'] = $request['copyright'];
        if (isset($request['is_primary'])) {
            $data['is_primary'] = true;
        } else {
            $data['is_primary'] = false;
        }

        if ($request->hasFile("file")) {
            $file = $request->file("file");
            $data['original_file_name'] = $file->getClientOriginalName();
            $file_type = explode(".", $data['original_file_name']);
            $file_type = strtolower($file_type[count($file_type) - 1]);

            $images = ["jpeg", "jpg", "png", "webp"];

            $gen_thumbnail = in_array($file_type, $images);

            $data['file_name'] = Str::uuid() . "." . $file_type;

            //create Entry
            $bi = BiographyImage::create($data);

            $path = $bi->path;

            $request->file("file")->storeAs($path, $data['file_name'], 'public');

            if ($gen_thumbnail) {
                $image = ImageManager::gd()->read($file);
                $image->scale(width: 250);
                \Storage::disk('public')->put($path . "/thumb_" . $data['file_name'], $image->toWebp());
            }
            return redirect("/admin/biography/" . $biography->id . "/edit")->with("success", "Bild hochgeladen");
        }
        return redirect("/admin/biography/" . $biography->id . "/edit")->with("error", "kein Bild hochgeladen");
    }

    public function destroy(BiographyImage $biographyImage){
        $this->check_permission("biography.image.delete");
        $biography = $biographyImage->biography;

        \Storage::disk("public")->delete($biographyImage->path.$biographyImage->file_name);
        \Storage::disk("public")->delete($biographyImage->path."thumb_".$biographyImage->file_name);

        $biographyImage->delete();
        return redirect("/admin/biography/$biography->id/edit")->with("success", "Bild entfernen");
    }
}
