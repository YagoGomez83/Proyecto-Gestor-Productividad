<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PoliceMovementCode extends Model
{
    protected $table = 'police_movement_code';

    protected $fillable = [
        'code',
        'description',
    ];

    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function subPoliceMovementCodes()
    {
        return $this->hasMany(SubPoliceMovementCode::class);
    }
}
