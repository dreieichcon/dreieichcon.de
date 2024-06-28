<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class StaticPage extends Model
{
    use Uuids;

    protected $fillable = [
        'name',
        'slug',
        'headline',
        'subheadline',
        'text',
    ];
}
