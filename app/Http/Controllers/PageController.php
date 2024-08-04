<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return Page::all();
    }


    public function show(Page $page)
    {
        return view("dc.page.show", [
            "page" => $page
        ]);
    }


}
