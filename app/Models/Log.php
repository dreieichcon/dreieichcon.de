<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Log extends Model
{
    use Uuids;
    protected $fillable = [
        'table',
        'type',
        'content',
        'user_id',
        'foreign_id'
    ];

    protected $casts = [
        'id' => 'string',
        'content' => 'array',
        'user_id' => 'string',
    ];

    public function user() :BelongsTo {
        return $this->belongsTo(User::class);
    }
}
