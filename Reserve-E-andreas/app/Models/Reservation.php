<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model{
    use HasFactory;
    protected $fillable = ['user_id', 'charging_station_id', 'date_of_reservation'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function chargingStation()
    {
        return $this->belongsTo(ChargingStation::class);
    }
}

