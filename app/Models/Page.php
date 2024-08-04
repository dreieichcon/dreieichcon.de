<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Page extends Model
{
    use Uuids;
    protected $fillable = [
        'title',
        'h1',
        'slug'
    ];

//    public function getRouteKeyName()
//    {
//        return 'slug';
//    }


    public function section(): BelongsToMany
    {
        return $this->belongsToMany(Section::class, "page_sections")->withPivot('order');
    }

    public function sortedSections(): BelongsToMany
    {
        return $this->section()
            ->orderByPivot('order');
    }
}
