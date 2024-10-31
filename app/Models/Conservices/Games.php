<?php

namespace App\Models\Conservices;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Games extends Model
{
    //is an on the fly model
    protected $connection = null;

    protected $casts = [
        "start" => "datetime",
    ];
}
