<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Programm extends Model
{
    use HasFactory;
    use Uuids;

    protected $fillable = [
        'event_id',
        'title',
        'description_short',
        'description_long',
        'start',
        'end',
        'duration',
    ];

    protected $with = ["type", "location"];

    protected function casts()
    {
        return [
            'start' => 'datetime',
            'end' => 'datetime',
        ];
    }

    public function event() :BelongsTo{
        return $this->belongsTo(Event::class);
    }

    public function type() : BelongsToMany{
        return  $this->belongsToMany(Type::class, "programm_types");
    }

    public function location() : BelongsToMany{
        return  $this->belongsToMany(Location::class, "programm_locations");
    }
}
