<?php

namespace App\Models;

use App\Enums\UserRole;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'last_name',
        'email',
        'password',
        'role',
        'group_id',
        'address',
        'phone_number',
        'city_id',
        'is_active',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'role' => UserRole::class,  // Convierte automáticamente a enum
    ];

    public function services()
    {
        return $this->hasMany(Service::class);
    }

    // Métodos de verificación de rol
    public function isOperator(): bool
    {
        return $this->role === UserRole::OPERATOR;
    }

    public function isSupervisor(): bool
    {
        return $this->role === UserRole::SUPERVISOR;
    }

    public function isCoordinator(): bool
    {
        return $this->role === UserRole::COORDINATOR;
    }
    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    // Método para eliminar un usuario lógicamente
    public function deleteUser(): bool
    {
        $this->is_active = false;
        return $this->save();
    }

    // Método para restaurar un usuario
    public function restoreUser(): bool
    {
        $this->is_active = true;
        return $this->save();
    }
}
