<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Biography extends Model
{
    use Uuids;
    protected $fillable = [
        'name',
        'short',
        'long',
    ];

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, "biography_categories");
    }
}
