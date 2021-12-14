<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Parker extends Model
{
    use HasFactory, HasApiTokens;

    public function log()
    {
        return $this->hasOne(Log::class);
    }
}
