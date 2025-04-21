<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    public function seats()
    {
        return $this->hasMany(Seat::class);
    }

    public function floors()
    {
        return $this->belongsTo(Floor::class);
        
    }
}
