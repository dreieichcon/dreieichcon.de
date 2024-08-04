<?php

namespace App\Http\Controllers;

use App\Models\SectionImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminSectionImageController extends Controller
{

    public function update(Request $request, SectionImage $sectionImage)
    {
        $data = $request->validate([
            "alt" => "required",
            "copyright" => "nullable",
        ]);

        $sectionImage->update($data);

        $section_id = $sectionImage->section->id;


        return redirect("/admin/section/$section_id/edit")->with("success", "Bildbeschreibung aktualisiert");
    }

    public function destroy(SectionImage $sectionImage)
    {
        $section_id = $sectionImage->section->id;


        //delete files
        Storage::disk("public")->delete($sectionImage->path . $sectionImage->file_name);
        Storage::disk("public")->delete($sectionImage->path . "thumb_" .$sectionImage->file_name);


        $sectionImage->delete();
        return redirect("/admin/section/$section_id/edit")->with("success", "Bild gelöscht");
    }
}
