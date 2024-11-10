<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Map extends Model
{
    use Uuids;
    protected $fillable = [
        'event_id',
        'name',
        'original_file_name',
    ];

    protected function casts(): array
    {
        return [
            'event_id' => 'string',
        ];
    }

    public string $path = "/images/maps/";
    public function event() :BelongsTo
    {
        return $this->belongsTo(Event::class);
    }

    public function src(): string
    {
        return "/storage" . $this->path . $this->file_name;
    }
    public function thumb() :string
    {
        return "/storage".$this->path . "thumb_" . $this->file_name;
    }
}
