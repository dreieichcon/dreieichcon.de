<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PageSection extends Model
{
    use Uuids;
    protected $fillable = [
        'page_id',
        'section_id',
        'order',
    ];

    protected function casts()
    {
        return [
            'page_id' => 'string',
            'section_id' => 'string',
        ];
    }


}
