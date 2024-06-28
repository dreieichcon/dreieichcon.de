<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    use Uuids;
    protected $fillable = [
        'plattform',
        'href',
        'sort',
    ];
}
