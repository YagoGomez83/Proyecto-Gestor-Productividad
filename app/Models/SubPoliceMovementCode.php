<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubPoliceMovementCode extends Model
{
    use HasFactory;
    protected $table = 'sub__police_movement_code';
    protected $fillable = [
        'description',
        'police_movement_code_id',
    ];

    public function policeMovementCode()
    {
        return $this->belongsTo(PoliceMovementCode::class);
    }
}
