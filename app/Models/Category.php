<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use Uuids;
    protected $fillable = [
        'name',
    ];

    public function biographies() :BelongsToMany
    {
        return $this->belongsToMany(Biography::class, 'biography_categories');
    }
}
