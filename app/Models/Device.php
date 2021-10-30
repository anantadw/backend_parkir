<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function street()
    {
        return $this->belongsTo(Street::class);
    }

    public function log()
    {
        return $this->hasOne(Log::class);
    }
}
