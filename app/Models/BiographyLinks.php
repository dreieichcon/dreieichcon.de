<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Casts\Attribute;
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

    protected function svg () :Attribute
    {
        $icon = $this->icon;
        //first part is the folder, second the icon
        $icon = explode(" ", $icon);
        switch ($icon[0]) {
            case "fab":
                $folder = "brands";
                break;
            case "fas":
                $folder = "solid";
                break;
            case "far":
                $folder = "regular";
                break;
            default:
                $folder = "icons";
        }

        $svg = substr($icon[1], 3);

        return new Attribute(
            get: fn() => $folder."/".$svg.".svg"
        );
    }
    public function biography(): BelongsTo
    {
        return $this->belongsTo(Biography::class);
    }
}
