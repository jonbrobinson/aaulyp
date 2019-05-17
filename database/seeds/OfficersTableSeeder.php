<?php

use Illuminate\Database\Seeder;

class OfficersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Officer::class, 10)->create();

        // Get all the roles attaching up to 3 random roles to each user
        $positions = App\Position::all();

        // Populate the pivot table
        App\Officer::with('positions')->each(function ($officer) use ($positions) {
            $num = rand(1,2);
            $position = $positions->random($num);
            if($num == 1) {
                $posIds = $position->id;
            } else {
                $posIds = $position->pluck('id')->toArray();
            }
            $officer->positions()->attach(
                $posIds, ['active' => 1]
            );
        });
    }
}
