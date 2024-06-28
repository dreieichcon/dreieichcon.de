<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class Navigation extends Model
{
    use Uuids;

    protected $fillable = [
        'name',
        'target_internal',
        'target_external',
        'target_special',
        'parent_id',
        'sort',
        'enabled',
    ];

    protected $with = "children";

    protected $casts = [
        'target_internal' => 'string',
        'parent' => 'string',
    ];

    public function parent()
    {
        return $this->belongsTo(Navigation::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Navigation::class, 'parent_id');
    }
}
