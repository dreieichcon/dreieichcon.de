<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SectionImage extends Model
{
    use Uuids;
    protected $fillable = [
        'section_id',
        'original_file_name',
        'file_name',
        'alt',
        'copyright',
    ];

    public string $path = "/images/sections/";
    public function section() :BelongsTo
    {
        return $this->belongsTo(Section::class);
    }

    public function src()
    {
        return "/storage" . $this->path . $this->file_name;
    }
    public function thumb()
    {
        return "/storage".$this->path . "thumb_" . $this->file_name;
    }

}
