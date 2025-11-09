<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Production;

class ProductionsSeeder extends Seeder
{
    public function run()
    {
        $productions = ['lait', 'viande'];
        foreach ($productions as $p) {
            Production::create(['name' => $p]);
        }
    }
}
