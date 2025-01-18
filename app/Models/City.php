<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class City extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'regional_unit_id', 'is_active'];

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

    public function cameras(): HasMany
    {
        return $this->hasMany(Camera::class);
    }

    public function deleteCity(): bool
    {
        $this->is_active = false;
        $result = $this->save();

        // Desactivar las entidades relacionadas
        if ($result) {
            $this->policeStations()->update(['is_active' => false]);
            $this->cameras()->update(['is_active' => false]);
        }

        return $result;
    }

    public function restoreCity(): bool
    {
        $this->is_active = true;
        $result = $this->save();

        // Restaurar las entidades relacionadas
        if ($result) {
            $this->policeStations()->update(['is_active' => true]);
            $this->cameras()->update(['is_active' => true]);
        }

        return $result;
    }
}
