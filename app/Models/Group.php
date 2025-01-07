<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'center_id', // Asumiendo que hay un centro relacionado
    ];

    // Relación con el modelo Center
    public function center(): BelongsTo
    {
        return $this->belongsTo(Center::class);
    }

    // Relación con el modelo Service
    public function services(): HasMany
    {
        return $this->hasMany(Service::class);
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
