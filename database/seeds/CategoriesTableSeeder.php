<?php

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
        $categories = array(
            'Food and Drink',
            'Business',
            'Entertainment',
            'Sports and Fitness',
            'Arts',
            'Charity',
        );

        foreach ($categories as $category) {
            factory(App\Category::class)->create([
                'name' => $category
            ]);
        }
    }
}
