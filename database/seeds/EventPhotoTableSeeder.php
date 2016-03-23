<?php

use Illuminate\Database\Seeder;

class EventPhotoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Event_Photo::class, 50)->create();
    }
}
