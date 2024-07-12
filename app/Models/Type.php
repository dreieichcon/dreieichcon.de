<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use Uuids;
    protected $fillable = [
        'name',
    ];
}
