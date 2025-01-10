<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Badge extends Model
{
    use HasFactory;

    protected $table = 'badges';

    public function users()
    {
        return $this->belongsToMany(User::class, 'badges_per_user')
            ->withPivot('counter_for_fullfillment');
    }
}

