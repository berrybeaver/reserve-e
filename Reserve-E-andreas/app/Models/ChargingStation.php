<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChargingStation extends Model
{
    protected $fillable = ['name', 'location'];

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
