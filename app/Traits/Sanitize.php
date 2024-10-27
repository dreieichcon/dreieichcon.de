<?php

namespace App\Traits;


trait Sanitize{
    function sanitizeUrl($string) {
        // Strip all characters that are not URL-safe
        return preg_replace('/[^a-zA-Z0-9\-_.~]/', '', $string);
    }
}




