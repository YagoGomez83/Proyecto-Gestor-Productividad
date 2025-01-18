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
        'initial_police_movement_code_id',
        'final_police_movement_code_id',
        'status',
        'description',
        'is_active',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function initialPoliceMovementCode()
    {
        return $this->belongsTo(PoliceMovementCode::class, 'initial_police_movement_code_id');
    }

    public function finalPoliceMovementCode()
    {
        return $this->belongsTo(PoliceMovementCode::class, 'final_police_movement_code_id');
    }

    public function deleteService(): bool
    {
        // Desactivar el servicio
        $this->is_active = false;
        $result = $this->save();

        return $result;
    }

    public function restoreService(): bool
    {
        // Restaurar el servicio
        $this->is_active = true;
        $result = $this->save();

        return $result;
    }
}
