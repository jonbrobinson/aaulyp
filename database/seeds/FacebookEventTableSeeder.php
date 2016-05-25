<?php

use Illuminate\Database\Seeder;

class FacebookEventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 5 ; $i++) {
            $event = factory(App\FacebookEvent::class)->create([
                'unique_id' => uniqid(),
            ]);

        }
    }
}
