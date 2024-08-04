<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Section extends Model
{
    use Uuids;
    protected $fillable = [
        'h1',
        'h2',
        'body',
    ];

    public function page() :BelongsToMany
    {
        return $this->belongsToMany(Page::class, "page_sections")->withPivot('order');
    }

    public function image() :HasMany
    {
        return $this->hasMany(SectionImage::class, "section_id");
    }
}
