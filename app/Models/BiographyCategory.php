<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class BiographyCategory extends Model
{
    use Uuids;
    protected $fillable = [
        'biography_id',
        'category_id',
    ];

    protected $casts = [
        'biography_id' => 'string',
        'category_id' => 'string',
    ];
}
