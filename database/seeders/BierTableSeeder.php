<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Bier;
use App\Models\Categorie;

class BierTableSeeder extends Seeder
{
    public function run()
    {
        // Disable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Truncate tables
        Categorie::truncate();
        Bier::truncate();

        // Re-enable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Categories
        $categories = [
            ['id' => 1, 'naam' => 'Pils'],
            ['id' => 2, 'naam' => 'Alcoholvrij'],
            ['id' => 3, 'naam' => 'Blond'],
            ['id' => 4, 'naam' => 'Radler'],
            ['id' => 5, 'naam' => 'Dubbel'],
            ['id' => 6, 'naam' => 'Lager'],
            ['id' => 7, 'naam' => 'Bok'],
        ];
        foreach ($categories as $category) {
            Categorie::create($category);
        }

        // Beers
        $beers = [
            ['id' => 1, 'naam' => 'Heineken', 'valt_onder_id' => NULL, 'categorie_id' => 1],
            ['id' => 2, 'naam' => 'Amstel', 'valt_onder_id' => NULL, 'categorie_id' => 1],
            ['id' => 3, 'naam' => 'Heineken 0.0', 'valt_onder_id' => 1, 'categorie_id' => 2],
            // Add other beers as necessary
        ];
        foreach ($beers as $beer) {
            Bier::create($beer);
        }

        // Re-enable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
