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
        for ($i = 1; $i <= 30 ; $i++) {
            factory(App\Event_Photo::class)->create([
                'event_id' => rand(1,5)
            ]);
        }
    }
}
