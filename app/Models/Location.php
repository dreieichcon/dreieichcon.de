<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Location extends Model
{
    use HasFactory;
    use Uuids;
    protected $fillable = [
        'name',
        'map_x',
        'map_y',
    ];

    public function programm() : BelongsToMany{
        return $this->belongsToMany(Programm::class, "programm_locations");
    }

}
