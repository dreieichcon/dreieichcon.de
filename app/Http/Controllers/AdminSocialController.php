<?php

namespace App\Http\Controllers;

use App\Models\Social;
use Illuminate\Http\Request;

class AdminSocialController extends Controller
{
    public function index()
    {
        $this->check_permission("admin.social");
        return view("admin.social.index", [
            'socials' => Social::all()
        ]);
    }

    public function create()
    {
        $this->check_permission("admin.social");
        return view("admin.social.form");
    }
    public function store(Request $request)
    {
        $this->check_permission("admin.social");
        $data = $request->validate([
            'plattform' => ['required'],
            'href' => ['required'],
            'sort' => ['required', 'integer'],
        ]);

        $social = Social::create($data);

        return redirect("/admin/social/$social->id/edit")
            ->with("success", "Social $social->plattform erstellt");

    }

    public function show(Social $social)
    {
        $this->check_permission("admin.social");
        return redirect("/admin/social/$social->id/edit");
    }

    public function edit(Social $social)
    {
        $this->check_permission("admin.social");
        return view("admin.social.form", [
            'social' => $social
        ]);
    }

    public function update(Request $request, Social $social)
    {
        $this->check_permission("admin.social");
        $data = $request->validate([
            'plattform' => ['required'],
            'href' => ['required'],
            'sort' => ['required', 'integer'],
        ]);

        $social->update($data);

        return redirect("/admin/social/$social->id/edit")
            ->with("success", "Social $social->plattform bearbeiten");
    }

    public function destroy(Social $social)
    {
        $this->check_permission("admin.social");
        $plattform = $social->plattform;
        $social->delete();

        return redirect("/admin/social/")
            ->with("success", "Social $plattform gelöscht");
    }
}
