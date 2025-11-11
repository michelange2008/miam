<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Race extends Model
{
    public function production()
    {
        return $this->belongsTo(Production::class);
    }
    public function physiologies()
    {
        return $this->hasMany(Physiologie::class);
    }
}
