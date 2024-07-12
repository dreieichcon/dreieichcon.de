<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class ProgrammType extends Model
{
    use Uuids;
    protected $fillable = [
        'programm_id',
        'type_id',
    ];

    protected function casts()
    {
        return [
            'programm_id' => 'string',
            'type_id' => 'string',
        ];
    }
}
