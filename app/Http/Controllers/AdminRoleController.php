<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class AdminRoleController extends Controller
{
    public function index()
    {
        $this->check_permission("admin.role");
        $roles = Role::all();
        return view("admin.role.index", [
            "roles" => $roles,
        ]);
    }

    public function create()
    {
        $this->check_permission("admin.role");
        return view("admin.role.form");
    }

    public function store(Request $request)
    {
        $this->check_permission("admin.role");
        $data = $request->validate([
            "name" => 'required',
        ]);

        $role = Role::create($data);

        return redirect("/admin/role")->with("success", "Rolle $role->name angelegt");
    }


    public function edit(Role $role)
    {
        $this->check_permission("admin.role");
        return view("admin.role.form", [
            "role" => $role,
        ]);
    }

    public function update(Request $request, Role $role)
    {
        $this->check_permission("admin.role");
        $data = $request->validate([
            "name" => 'required',
        ]);

        $role->update($data);
        return redirect("/admin/role/$role->id/edit")->with("success", "Rolle $role->name bearbeitet");

    }

    public function permission_add(Request $request, Role $role)
    {
        $this->check_permission("admin.role");
        $data = $request->validate([
            "name" => 'required',
        ]);

        foreach($data["name"] as $name){
            $permission = Permission::where("name", $name)->first();
            $role->givePermissionTo($permission);
        }
        return redirect("/admin/role/$role->id/edit")->with("success", "Rolle $role->name bearbeitet");
    }

    public function permission_remove(Request $request, Role $role)
    {
        $this->check_permission("admin.role");
        $data = $request->validate([
            "name" => 'required',
        ]);

        foreach($data["name"] as $name){
            $permission = Permission::where("name", $name)->first();
            $role->revokePermissionTo($permission);
        }
        return redirect("/admin/role/$role->id/edit")->with("success", "Rolle $role->name bearbeitet");
    }




}
