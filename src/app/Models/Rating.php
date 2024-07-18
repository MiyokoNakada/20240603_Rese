<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_id',
        'rating',
        'comment'
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}
