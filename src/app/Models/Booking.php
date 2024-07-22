<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
         
    protected $fillable = [
        'user_id',
        'shop_id',
        'date',
        'time',
        'people_number',
        'visit_at'
    ];
    
    public function user(){
        return $this->belongsTo(User::class);
    }
  
    public function shop(){
        return $this->belongsTo(Shop::class);
    }
    
    public function rating()
    {
        return $this->hasOne(Rating::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}
