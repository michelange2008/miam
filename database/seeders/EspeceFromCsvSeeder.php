<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Espece;
use App\Models\Production;
use App\Models\Race;
use App\Models\Physiologie;

class EspeceFromCsvSeeder extends Seeder
{
    public function run()
    {
        $path = database_path('seeders/data/animaux.csv');

        if (!file_exists($path)) {
            $this->command->error("Fichier CSV non trouvé : $path");
            return;
        }

        $handle = fopen($path, 'r');
        if ($handle === false) {
            $this->command->error("Impossible d’ouvrir le fichier CSV.");
            return;
        }

        // Lecture de l’en-tête
        $headers = fgetcsv($handle, 1000, ';');
        if (!$headers) {
            $this->command->error("En-tête du CSV introuvable.");
            fclose($handle);
            return;
        }

        $count = 0;
        while (($data = fgetcsv($handle, 1000, ';')) !== false) {
            $row = array_combine($headers, $data);

            // Nettoyage des champs
            $especeName = trim($row['espece'] ?? '');
            $productionName = trim($row['production'] ?? '');
            $raceName = trim($row['race'] ?? '');

            if (!$especeName || !$productionName || !$raceName) {
                continue;
            }

            // Création ou récupération de l'espèce
            $espece = Espece::firstOrCreate(['name' => $especeName]);

            // Création ou récupération de la production
            $production = Production::firstOrCreate([
                'name' => $productionName,
                'espece_id' => $espece->id,
            ]);

            // Création ou récupération de la race
            $race = Race::firstOrCreate([
                'name' => $raceName,
                'production_id' => $production->id,
            ]);

            // Création des physiologies standards
            $physiologies = [
                'entretien',
                'fin de gestation',
                'debut de lactation',
                'milieu de lactation'
            ];

            foreach ($physiologies as $physName) {
                Physiologie::firstOrCreate([
                    'name' => $physName,
                    'race_id' => $race->id,
                ]);
            }

            $count++;
        }

        fclose($handle);

        $this->command->info("✅ Import terminé : $count lignes traitées avec succès.");
    }
}
