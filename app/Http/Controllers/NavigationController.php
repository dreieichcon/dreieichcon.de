<?php

namespace App\Http\Controllers;

use App\Models\Navigation;
use App\Models\Page;
use App\Traits\Logger;
use Illuminate\Http\Request;

class NavigationController extends Controller
{
    use Logger;
    public function index()
    {
        $this->check_permission("navigation");
        $navigation = Navigation::whereNull("parent_id")->orderBy("sort")->get();


        return view("admin.navigation.index", [
            "navigation" => $navigation
        ]);
    }

    public function create()
    {
        $this->check_permission("navigation");

        $navigation = Navigation::whereNull("parent_id")->orderBy("sort")->get();
        return view("admin.navigation.form", [
            "all_navigation" => $navigation,
            "pages" => Page::all(),
            "special_pages" => ["game", "programm"],
        ]);
    }

    public function store(Request $request)
    {
        $this->check_permission("navigation");
        $data = $request->validate([
            'name' => ['required'],
            'sort' => ['required', 'numeric'],
            'target_internal' => ['nullable'],
            'target_external' => ['nullable'],
            'target_special' => ['nullable'],
            'parent_id' => ['nullable'],
        ]);

        $nav = Navigation::create($data);

        $this->create_log("navigation", $nav->id, "CREATE", $nav->toArray());

        return redirect("/admin/navigation")->with("success", "Navigation $nav->name angelegt");

    }

    public function edit(Navigation $navigation)
    {
        $this->check_permission("navigation");

        $all_navigation = Navigation::whereNull("parent_id")->orderBy("sort")->get();
        return view("admin.navigation.form", [
            "all_navigation" => $all_navigation,
            "navigation" => $navigation,
            "pages" => Page::all(),
            "special_pages" => ["game", "programm"],

        ]);
    }

    public function update(Request $request, Navigation $navigation)
    {
        $this->check_permission("navigation");
        $data = $request->validate([
            'name' => ['required'],
            'sort' => ['required', 'numeric'],
            'target_internal' => ['nullable'],
            'target_external' => ['nullable'],
            'target_special' => ['nullable'],
            'parent_id' => ['nullable'],
            'enabled' => ['nullable']
        ]);

        if(!isset($data['enabled'])) {
            $navigation->enabled = false;
        }else{
            $navigation->enabled = true;
        }
        unset($data["enabled"]);

        $navigation->update($data);
        $diffs = $navigation->getChanges();

        $this->create_log("navigation", $navigation->id, "UPDATE", $diffs);

        return redirect("/admin/navigation/$navigation->id/edit")->with("success", "Navigation $navigation->name bearbeitet");
    }

    public function destroy(Navigation $navigation)
    {
        $this->check_permission("navigation");
        $entry = $navigation->name;
        //check children
        Navigation::where("parent_id", $navigation->id)
            ->delete();

        $navigation->delete();

        return redirect("/admin/navigation")
            ->with("success", "Eintrag $entry gelöscht");
    }
}
