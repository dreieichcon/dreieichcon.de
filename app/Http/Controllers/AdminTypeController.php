<?php

namespace App\Http\Controllers;

use App\Models\ProgrammType;
use App\Models\Type;
use Illuminate\Http\Request;

class AdminTypeController extends Controller
{
    public function index()
    {
        $this->check_permission("admin.type.index");
        return view('admin.programm.type.index', [
            'types' => Type::all()
        ]);
    }

    public function create()
    {
        $this->check_permission("admin.type.create");
        return view('admin.programm.type.form');
    }

    public function store(Request $request)
    {
        $this->check_permission("admin.type.store");
        $data = $request->validate([
            'name' => ['required'],
        ]);

        $type = Type::create($data);

        return redirect("/admin/type/$type->id/edit")->with('success', 'Type wurde erfolgreich angelegt.');
    }

    public function show(Type $type)
    {
       return redirect("/admin/type/$type->id/edit");
    }

    public function edit(Type $type)
    {
        $this->check_permission("admin.type.update");
        return view('admin.programm.type.form', [
            'type' => $type
        ]);
    }
    public function update(Request $request, Type $type)
    {
        $this->check_permission("admin.type.update");
        $data = $request->validate([
            'name' => ['required'],
        ]);

        $type->update($data);

        return redirect("/admin/type/$type->id/edit")->with('success', 'Type wurde erfolgreich angelegt.');
    }

    public function destroy(Type $type)
    {
        $this->check_permission("admin.type.destroy");

        $type_name = $type->name;
        $linked_programms = array();



        //delete all Connections
        ProgrammType::where("type_id", $type->id)->delete();


        //delete
        $type->delete();

        //return
        return redirect("/admin/type/")->with("success", "Typ $type_name erfolgreich gelöscht");
    }
}
