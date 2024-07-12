<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class ProgrammLocation extends Model
{
    use Uuids;
    protected $fillable = [
        'programm_id',
        'location_id',
    ];

    protected function casts()
    {
        return [
            'programm_id' => 'string',
            'location_id' => 'string',
        ];
    }
}
