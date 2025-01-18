<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Camera extends Model
{
    protected $fillable = [
        'identifier',
        'location_id',
        'city_id',
        'police_station_id',
        'is_active',
    ];

    public function policeStation(): BelongsTo
    {
        return $this->belongsTo(PoliceStation::class, 'police_station_id');
    }


    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function deleteCamera(): bool
    {
        $this->is_active = false;
        return $this->save();
    }

    public function restoreCamera(): bool
    {
        $this->is_active = true;
        return $this->save();
    }
}
