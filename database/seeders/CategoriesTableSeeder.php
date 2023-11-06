<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['For Men', 'For Women'];

        foreach ($categories as $category_value) {
            $new_category = new Category();
            $new_category->name = $category_value;
            $new_category->save();
        }
    }
}
