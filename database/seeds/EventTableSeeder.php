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
            factory(App\Event::class)->create([
                'user_id' => rand(1, 4)
            ]);
        }
    }
}
