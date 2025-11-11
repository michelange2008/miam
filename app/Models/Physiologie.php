<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Physiologie extends Model
{
    public function race()
    {
        return $this->belongsTo(Race::class);
    }
}
