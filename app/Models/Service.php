<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_date',
        'service_time',
        'user_id',
        'group_id',
        'city_id',
        'status',
        'description',
        'police_movement_code_id',
    ];

    // Relación con el modelo User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relación con el modelo Group
    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    // Relación con el modelo City
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    // Relación con el modelo PoliceMovementCode
    public function policeMovementCode()
    {
        return $this->belongsTo(PoliceMovementCode::class);
    }

    // Relación a través de Group para obtener el Center
    public function center()
    {
        return $this->group->center();
    }
}
