<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'center_id', // Asumiendo que hay un centro relacionado
    ];

    // Relación con el modelo Center
    public function center()
    {
        return $this->belongsTo(Center::class);
    }

    // Relación con el modelo Service
    public function services()
    {
        return $this->hasMany(Service::class);
    }
}
