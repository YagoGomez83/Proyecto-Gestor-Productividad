<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class City extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'regional_unit_id'];

    /**
     * Relación: Una ciudad pertenece a una unidad regional.
     */
    public function regionalUnit(): BelongsTo
    {
        return $this->belongsTo(RegionalUnit::class);
    }

    public function policeStations(): HasMany
    {
        return $this->hasMany(PoliceStation::class);
    }
}
