<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = ['Parfum', 'Eau de Toilette', 'Cologne', 'Body Spray'];

        foreach ($types as $type_value) {
            $new_type = new Type();
            $new_type->name = $type_value;
            $new_type->save();
        }
    }
}
