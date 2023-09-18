<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
            'user_id',
            'doctor_id',
            'booking_date',
            'status'
    ];

    public function scopeBooked(Builder $query){
        $query->where('status',  '0');
    }
    public function scopeDetected(Builder $query){
        $query->where('status',  '1');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function doctor(){
        return $this->belongsTo(Doctor::class);
    }
}
