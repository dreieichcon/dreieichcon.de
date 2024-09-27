<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Log;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;


    protected function check_permission(String $permission){
        if(auth()->user()->can($permission)){
            return true;
        }else{
            Log::info("test");
            abort(403);
        }
    }
}
