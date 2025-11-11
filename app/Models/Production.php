<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Production extends Model
{
    public function espece()
    {
        return $this->belongsTo(Espece::class);
    }
    public function races()
    {
        return $this->hasMany(Race::class);
    }
}
