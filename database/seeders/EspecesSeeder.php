<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Espece;

class EspecesSeeder extends Seeder
{
    public function run()
    {
        $especes = ['bovin', 'ovin', 'caprin'];
        foreach ($especes as $e) {
            Espece::create(['name' => $e]);
        }
    }
}
