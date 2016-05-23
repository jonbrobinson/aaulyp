<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(CategoriesTableSeeder::class);
        $this->call(TagTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(EventTableSeeder::class);
        $this->call(EventPhotoTableSeeder::class);

        Model::reguard();
    }
}
