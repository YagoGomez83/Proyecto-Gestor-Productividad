<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Center extends Model
{
    protected $fillable = ['name'];

    public function services(): HasMany
    {
        return $this->hasMany(Service::class);
    }
    public function groups(): HasMany
    {
        return $this->hasMany(Group::class);
    }

    public function regionalUnits(): HasMany
    {
        return $this->hasMany(RegionalUnit::class);
    }
}
