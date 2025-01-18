<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RegionalUnit extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'center_id', 'is_active'];

    /**
     * Relación: Una unidad regional pertenece a un centro.
     */
    public function center(): BelongsTo
    {
        return $this->belongsTo(Center::class);
    }

    /**
     * Relación: Una unidad regional tiene muchas ciudades.
     */
    public function cities(): HasMany
    {
        return $this->hasMany(City::class);
    }

    public function deleteRegionalUnit(): bool
    {
        // Desactivar la unidad regional
        $this->is_active = false;
        $result = $this->save();

        // Desactivar las entidades relacionadas
        if ($result) {
            $this->cities()->update(['is_active' => false]);
        }

        return $result;
    } // deleteRegionalUnit

    public function restoreRegionalUnit(): bool
    {
        // Restaurar la unidad regional
        $this->is_active = true;
        $result = $this->save();

        // Restaurar las entidades relacionadas
        if ($result) {
            $this->cities()->update(['is_active' => true]);
        }

        return $result;
    } // restoreRegionalUnit 
}
