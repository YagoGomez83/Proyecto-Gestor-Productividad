<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Location extends Model
{
    protected $fillable = [
        'name',
        'regional_unit_id'
    ];

    public function regionalUnit(): BelongsTo
    {
        return $this->belongsTo(RegionalUnit::class, 'regional_unit_id');
    }
}
