<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Espece extends Model
{
    public function productions()
    {
        return $this->hasMany(Production::class);
    }
}
