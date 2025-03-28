<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RegionalUnit extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'center_id'];

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
}
