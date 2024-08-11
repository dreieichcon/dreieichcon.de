<?php

namespace App\Http\Controllers;

use App\Models\Biography;
use App\Models\BiographyCategory;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminBiographyController extends Controller
{
    public function index()
    {
        return view("admin.biography.index", [
            "biographies" => Biography::all()
        ]);
    }

    public function create()
    {
        return view("admin.biography.form");
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            "name" => ["required", "min:3", "max:255", "unique:biographies"],
            "short" => ["required", "min:3", "max:255"],
            "long" => ["required"],
        ]);

        $biography = Biography::create($data);

        return redirect("/admin/biography/$biography->id/edit")->with("success", "Biografie angelegt");
    }

    public function show(Biography $biography)
    {
    }

    public function edit(Biography $biography)
    {
        return view("admin.biography.form", [
            "biography" => $biography
        ]);
    }

    public function update(Request $request, Biography $biography)
    {
        $data = $request->validate([
            "name" => ["required", "min:3", "max:255"],
            "short" => ["required", "min:3", "max:255"],
            "long" => ["required"],
        ]);

        $biography->update($data);

        return redirect("/admin/biography/$biography->id/edit")->with("success", "Biografie bearbeitet");
    }


    public function categoryAdd(Request $request, Biography $biography)
    {
        $data = $request->validate([
            "id" => ["required"],
        ]);

        foreach($data["id"] as $id) {
           BiographyCategory::create(["biography_id" => $biography->id, "category_id" => $id]);
        }

        return redirect("/admin/biography/$biography->id/edit")->with("success", "Biografie bearbeitet");
    }

    public function categoryRemove(Request $request, Biography $biography)
    {
        $data = $request->validate([
            "id" => ["required"],
        ]);
        foreach($data["id"] as $id) {
            BiographyCategory::where(["biography_id" => $biography->id, "category_id" => $id])->delete();
        }
        return redirect("/admin/biography/$biography->id/edit")->with("success", "Biografie bearbeitet");
    }
}
