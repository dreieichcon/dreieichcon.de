<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\PageSection;
use App\Models\Section;
use Illuminate\Http\Request;

class AdminPageController extends Controller
{
    public function index()
    {
        $pages = Page::all();
        return view("admin.page.index", [
            "pages" => $pages
        ]);
    }

    public function create()
    {
        return view("admin.page.form");
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            "title" => "required",
            "h1" => "required",
            "slug" => "required",
        ]);

        $page = Page::create($data);

        return redirect("/admin/page/" . $page->id . "/edit")->with("success", "Seite erfolgreich angelegt");
    }

    public function show(Page $page)
    {
        return redirect("/admin/page/" . $page->id . "/edit");
    }

    public function edit(Page $page)
    {
        return view("admin.page.form", [
            "page" => $page
        ]);
    }

    public function update(Request $request, Page $page)
    {
        $data = $request->validate([
            "title" => "required",
            "h1" => "required",
            "slug" => "required",
        ]);

        $page->update($data);
        return redirect("/admin/page/" . $page->id . "/edit")->with("success", "Seite erfolgreich bearbeitet");
    }

    public function sectionForm(Page $page)
    {
        return view("admin.section.form", [
            "page" => $page
        ]);
    }

    public function sectionStore(Request $request, Page $page)
    {
        $data = $request->validate([
            'h1' => 'required',
            'h2' => 'required',
            'body' => 'required',
        ]);

        $section = Section::create(array_merge($data, ['page_id' => $page->id]));

        $last_order = PageSection::where('page_id', $page->id)->max('order');
        $order = $last_order + 1;
        PageSection::create([
            "section_id" => $section->id,
            "page_id" => $page->id,
            "order" => $order,
        ]);

        return redirect("/admin/page/" . $page->id . "/edit")->with("success", "Unterseite erfolgreich angelegt");
    }

    public function sectionAdd(Request $request, Page $page)
    {
        $data = $request->validate([
            "section_id" => "required",
        ]);

        $last_order = PageSection::where('page_id', $page->id)->max('order');
        $order = $last_order + 1;
        PageSection::create([
            "section_id" => $data['section_id'],
            "page_id" => $page->id,
            "order" => $order,
        ]);

        return redirect("/admin/page/" . $page->id . "/edit")->with("success", "Unterseite erfolgreich zugewiesen");
    }

    public function sectionUnlink(Request $request, Page $page)
    {
        $data = $request->validate([
            "section_id" => "required",
        ]);

        PageSection::where('page_id', $page->id)
            ->where('section_id', $data['section_id'])
            ->delete();


        return redirect("/admin/page/" . $page->id . "/edit")->with("success", "Unterseite erfolgreich entfernt");
    }
}
