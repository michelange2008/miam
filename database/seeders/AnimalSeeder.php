<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Animal;
use App\Models\Espece;
use App\Models\Race;
use App\Models\Production;
use App\Models\Physiologie;

class AnimalsSeeder extends Seeder
{
    public function run()
    {
        // Exemple d’animaux par espèce
        $animauxData = [
            [
                'espece' => 'bovin',
                'race' => 'Holstein',
                'production' => 'lait',
                'physiologie' => 'lactation',
                'effectif' => 10,
                'poids' => 600,
                'lait_quantite' => 25,
                'lait_mg' => 3.8,
                'lait_mp' => 3.2,
            ],
            [
                'espece' => 'bovin',
                'race' => 'Charolaise',
                'production' => 'viande',
                'physiologie' => 'gestation',
                'effectif' => 8,
                'poids' => 650,
                'prolificite' => 1.0,
            ],
            [
                'espece' => 'ovin',
                'race' => 'Suffolk',
                'production' => 'viande',
                'physiologie' => 'engrais',
                'effectif' => 15,
                'poids' => 70,
                'gmq' => 250,
            ],
            [
                'espece' => 'caprin',
                'race' => 'Alpine',
                'production' => 'lait',
                'physiologie' => 'lactation',
                'effectif' => 20,
                'poids' => 60,
                'lait_quantite' => 3,
                'lait_mg' => 4,
                'lait_mp' => 3.5,
            ],
        ];

        foreach ($animauxData as $data) {
            $espece = Espece::where('name', $data['espece'])->first();
            $race = Race::where('name', $data['race'])->first();
            $production = Production::where('name', $data['production'])->first();
            $physio = Physiologie::where('name', $data['physiologie'])->first();

            Animal::create([
                'espece_id' => $espece->id,
                'race_id' => $race->id,
                'production_id' => $production->id,
                'physiologie_id' => $physio->id,
                'effectif' => $data['effectif'],
                'poids' => $data['poids'],
                'prolificite' => $data['prolificite'] ?? null,
                'lait_quantite' => $data['lait_quantite'] ?? null,
                'lait_mg' => $data['lait_mg'] ?? null,
                'lait_mp' => $data['lait_mp'] ?? null,
                'gmq' => $data['gmq'] ?? null,
            ]);
        }
    }
}
