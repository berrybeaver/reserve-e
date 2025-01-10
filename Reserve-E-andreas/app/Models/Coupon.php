<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    // Allow mass assignment for these fields
    protected $fillable = [
        'name',
        'description',
        'points_required',
    ];
}
