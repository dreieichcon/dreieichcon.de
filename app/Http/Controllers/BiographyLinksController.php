<?php

namespace App\Http\Controllers;

use App\Models\Biography;
use App\Models\BiographyLinks;
use Illuminate\Http\Request;

class BiographyLinksController extends Controller
{


    public function store(Request $request, Biography $biography)
    {
        $this->check_permission("content.biography");
        $data = $request->validate([
            'icon' => ['required'],
            'name' => ['required'],
            'href' => ['required'],
        ]);

        $biography_link = BiographyLinks::create(array_merge($data, ["biography_id" => $biography->id]));

        return redirect("/admin/biography/$biography_link->biography_id/edit")
            ->with("success", "Link angelegt");
    }


    public function destroy(BiographyLinks $biography_link)
    {
        $this->check_permission("content.biography");


        $biography_id = $biography_link->biography_id;
        $biography_link->delete();

        return redirect("/admin/biography/$biography_id/edit")
            ->with("success", "Link gelöscht");
    }
}
