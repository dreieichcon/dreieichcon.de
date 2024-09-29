<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class FontAwesome extends Model
{
    use Uuids;
    protected $fillable = [
        'class',
        'name',
        'category',
    ];
}
