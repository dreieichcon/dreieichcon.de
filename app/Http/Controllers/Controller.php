<?php

namespace App\Http\Controllers;

use App\Traits\Sanitize;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Log;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    use Sanitize;

    protected function check_permission(String $permission){
        if(auth()->user()->can($permission)){
            return true;
        }else{
            Log::info("test");
            abort(403);
        }
    }

    protected function generate_slug($string)
    {
        // transform input to slug
        // all lower case, space replaced by underscore
        // at last strip all non-URL-Save characters

        $name_sanitized = strtolower($string);
        $name_sanitized = str_replace(' ', '_', $name_sanitized);
        $name_sanitized = $this->sanitizeUrl($name_sanitized);

        return $name_sanitized;
    }
}
