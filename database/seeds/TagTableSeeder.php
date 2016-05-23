<?php

use Illuminate\Database\Seeder;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = array(
            'General Body Meeting',
            'Volunteer',
            'Mixer',
            'Fundraiser',
            'Political',
            'Gardening',
            'Debate',
            'Happy Hour',
            'Professional Development',
            'Technology',
            'Conference Call'
        );

        foreach ($tags as $tag) {
            factory(App\Tag::class)->create([
                'name' => $tag
            ]);
        }
    }
}
