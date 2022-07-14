<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;

    protected $casts = [
        'time' => 'datetime:Y-m-d',
    ];
    
    protected $fillable = [
        'parker_id',
        'time'
    ];

    public function parker()
    {
        return $this->belongsTo(Parker::class);
    }
}
