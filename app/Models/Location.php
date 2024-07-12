<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    use Uuids;
    protected $fillable = [
        'name',
        'map_x',
        'map_y',
    ];
}
