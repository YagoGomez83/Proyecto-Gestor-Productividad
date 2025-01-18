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
        'center_id',
        'is_active',
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

    public function deteleGroup(): bool
    {
        // Desactivar el grupo
        $this->is_active = false;
        $result = $this->save();

        // Desactivar las entidades relacionadas
        if ($result) {
            $this->services()->update(['is_active' => false]);
            $this->users()->update(['is_active' => false]);
        }

        return $result;
    } // fin método deteleGroup

    public function restoreGroup(): bool
    {
        // Restaurar el grupo
        $this->is_active = true;
        $result = $this->save();

        // Restaurar las entidades relacionadas
        if ($result) {
            $this->services()->update(['is_active' => true]);
            $this->users()->update(['is_active' => true]);
        }

        return $result;
    } // fin método restoreGroup 
}
