<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Camera extends Model
{
    protected $fillable = [
        'identifier',
        'address',
        'latitude',
        'longitude',
        'police_station_id'
    ];

    public function policeStation(): BelongsTo
    {
        return $this->belongsTo(PoliceStation::class, 'police_station_id');
    }
}
