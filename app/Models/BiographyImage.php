<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BiographyImage extends Model
{
    use Uuids;

    protected $fillable = [
        'biography_id',
        'original_file_name',
        'is_primary',
        'file_name',
        'alt',
        'copyright',
    ];

    protected function casts(): array
    {
        return [
            'biography_id' => 'string',
        ];
    }
    public string $path = "/images/biographies/";

    public function biography(): BelongsTo
    {
        return $this->belongsTo(Biography::class);
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
