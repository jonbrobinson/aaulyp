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

        factory(App\Event::class, 10)->create()->each(function($u) {
            $u->photos()->save(factory(App\Event_Photo::class)->make());
        });
    }
}
