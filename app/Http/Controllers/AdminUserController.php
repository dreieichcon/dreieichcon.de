<?php

namespace App\Http\Controllers;

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

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }
}
