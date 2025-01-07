<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PoliceMovementCode extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'description',
    ];

    // Relación inversa con el modelo Service
    public function services()
    {
        return $this->hasMany(Service::class);
    }
}
