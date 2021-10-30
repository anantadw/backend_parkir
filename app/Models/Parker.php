<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parker extends Model
{
    use HasFactory;

    public function log()
    {
        return $this->hasOne(Log::class);
    }
}