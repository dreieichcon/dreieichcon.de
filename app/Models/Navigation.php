<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function parent(): BelongsToMany
    {
        return $this->belongsTo(Navigation::class, 'parent_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(Navigation::class, 'parent_id');
    }

    public function href(): string
    {


        //priority: target_special, target_external, target_internal

        if (!is_null($this->target_special) || strlen($this->target_special) > 0) {
            $href = $this->target_special;
        } elseif (!is_null($this->target_external) || strlen($this->target_external) > 0) {
            $href = $this->target_external;
        } elseif (!is_null($this->target_internal) || strlen($this->target_internal) > 0) {
            $href = $this->target_internal;
        }else{
            $href = "";
        }


        return $href;
    }
}
