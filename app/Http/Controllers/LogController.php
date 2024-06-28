<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Http\Request;

class LogController extends Controller
{
    public function index()
    {
        $this->check_permission("log");
       return view("admin.log.index", [
           "log" => Log::orderByDesc("created_at")->limit(1000)->get(),
       ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'database' => ['required'],
            'type' => ['required'],
            'content' => ['nullable'],
            'user_id' => ['required'],
        ]);

        return Log::create($data);
    }

    public function show(Log $log)
    {
        return $log;
    }

    public function update(Request $request, Log $log)
    {
        $data = $request->validate([
            'database' => ['required'],
            'type' => ['required'],
            'content' => ['nullable'],
            'user_id' => ['required'],
        ]);

        $log->update($data);

        return $log;
    }

    public function destroy(Log $log)
    {
        $log->delete();

        return response()->json();
    }
}
