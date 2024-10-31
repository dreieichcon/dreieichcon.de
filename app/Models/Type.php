<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Type extends Model
{
    use Uuids;
    protected $fillable = [
        'name',
    ];

    protected function programm() :BelongsToMany
    {
        return $this->belongsToMany(Programm::class, 'programm_types');
    }
}
