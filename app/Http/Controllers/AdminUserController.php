<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Traits\Logger;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminUserController extends Controller
{
    use Logger;
    public function index()
    {
        $this->check_permission("admin.user");

        return view("admin.user.index", [
            "user" => User::all(),
        ]);
    }

    public function create()
    {
        $this->check_permission("admin.user");
        return view("admin.user.form");
    }

    public function store(Request $request)
    {
        $this->check_permission("admin.user");

        $data = $request->validate([
            "name" => ["required"],
            "email" => ["required", "email"],
        ]);

        $password = Str::password(12);

        $user = User::create(array_merge($data, ["password" => Hash::make($password)]));
        $user_db = [
            "name" => $user->name,
            "email" => $user->email,
        ];


        $this->create_log("user", $user->id, "CREATE", $user_db);

        return redirect("/admin/user")->with("success", "Benutzer $user->name erfolgreich angelegt");
    }



    public function edit(User $user)
    {
        $this->check_permission("admin.user");
        return view("admin.user.form", [
            "user" => $user,
        ]);
    }

    public function update(Request $request, User $user)
    {
        $this->check_permission("admin.user");
        $data = $request->validate([
            "name" => ["required"],
            "email" => ["required", "email"],
        ]);

        $user->update($data);
        $changed_data = $user->getChanges();

        $this->create_log("user", $user->id, "UPDATE", $changed_data);
        return redirect("/admin/user/" . $user->id . "/edit")->with("success", "Benutzer $user->name erfolgreich bearbeitet");
    }

    public function destroy($id)
    {



    }

    public function role_add(Request $request, User $user)
    {
        $this->check_permission("admin.user");
        $data = $request->validate([
            "name" => 'required',
        ]);

        foreach($data["name"] as $name){
            $role = Role::where("name", $name)->first();
            $user->assignRole($role);
        }

        return redirect("/admin/user/$user->id/edit")->with("success", "Berechtigungen angepasst");

    }

    public function role_remove(Request $request, User $user)
    {
        $this->check_permission("admin.user");
        $data = $request->validate([
            "name" => 'required',
        ]);

        foreach($data["name"] as $name){
            $role = Role::where("name", $name)->first();
            $user->removeRole($role);
        }

        return redirect("/admin/user/$user->id/edit")->with("success", "Berechtigungen angepasst");

    }
}
