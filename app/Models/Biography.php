<?php

namespace App\Models;

use App\Traits\Sanitize;
use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;



class Biography extends Model
{
    use Uuids;
    use Sanitize;

    protected $fillable = [
        'name',
        'short',
        'long',
        'slug',
    ];



    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, "biography_categories");
    }
    public function links(): HasMany
    {
        return $this->hasMany(BiographyLinks::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(BiographyImage::class);
    }
}
