<?php

use Illuminate\Database\Seeder;

class EventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 5 ; $i++) {
            $event = factory(App\Event::class)->create([
                'user_id' => rand(1, 4)
            ]);

            $category = \App\Category::find(mt_rand(1,6));

            $event->category()->attach($category);

            $this->addTags($event);

        }
    }

    public function addTags($event, $maxTags = 5)
    {
        for ($i = 1; $i <= $maxTags ; $i++) {

            $tag = \App\Tag::find($i);

            $event->tag()->attach($tag);

        }
    }
}
