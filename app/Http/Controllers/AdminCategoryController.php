<?php

namespace App\Http\Controllers;

use App\Models\BiographyCategory;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.index', [
            "categories" => Category::all()
        ]);
    }

    public function create()
    {
        return view('admin.category.form', []);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            "name" => "required",
            "slug" => "required",
        ]);
        $category = Category::create($data);
        return redirect("/admin/category/$category->id/edit")->with("success", "Kategorie erfolgreich angelegt!");
    }



    public function edit(Category $category)
    {
        return view('admin.category.form', [
            "category" => $category
        ]);
    }

    public function update(Request $request, Category $category)
    {
        $data = $request->validate([
            "name" => "required",
            "slug" => "required",
        ]);
        $category->update($data);
        return redirect("/admin/category/$category->id/edit")->with("success", "Kategorie bearbeitet");
    }

    public function destroy(Category $category)
    {
        //delete all links to bios
        $category_name = $category->name;
        BiographyCategory::where("category_id", $category->id)->delete();
        Category::where("id", $category->id)->delete();
        return redirect("/admin/category")->with("success", "Kategorie $category_name erfolgreich gelöscht");
    }
}
