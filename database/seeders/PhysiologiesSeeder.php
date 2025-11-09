<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Physiologie;

class PhysiologiesSeeder extends Seeder
{
    public function run()
    {
        $stades = ['tarissement', 'gestation', 'lactation', 'engrais'];
        foreach ($stades as $s) {
            Physiologie::create(['name' => $s]);
        }
    }
}
