<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BiographyLinks extends Model
{
    use Uuids;
    protected $fillable = [
        'biography_id',
        'icon',
        'name',
        'href',
    ];

    protected function casts(): array
    {
        return [
            'biography_id' => 'string',
        ];
    }

    public function biography(): BelongsTo
    {
        return $this->belongsTo(Biography::class);
    }
}
