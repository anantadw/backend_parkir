<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    
    protected $casts = [
        'in_time' => 'datetime:Y-m-d',
        'out_time' => 'datetime:Y-m-d'
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function device()
    {
        return $this->belongsTo(Device::class);
    }
}
