<?php

namespace Database\Seeders;

use App\Models\Perfume;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class PerfumesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 50; $i++) {
            $perfume = new Perfume();
            $perfume->title = $faker->sentence(2);
            $perfume->brand = $faker->randomElement(["Armani", "Paco Rabanne", "Dolce & Gabbana", "Tommy Hilfiger", "Calvin Klein", "Chanel", "Gucci", "Dior", "Versace"]);
            $perfume->size = $faker->randomElement(["Small", "Medium", "Large"]);
            $perfume->price = $faker->randomFloat(2, 10, 200);
            $perfume->description = $faker->text();
            $perfume->save();
        }
    }
}
