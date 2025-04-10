<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ticket extends Model
{
    protected $fillable = [
        'flight_id',
        'passanger_name',
        'passenger_phone', 
        'seat_number',
        'is_boarding',
        'boarding_time'
    ];
    protected $casts = [
        'boarding_time' => 'datetime'
    ];
    public function flight(): BelongsTo
    {
        return $this->belongsTo(Flight::class);
    }
}
