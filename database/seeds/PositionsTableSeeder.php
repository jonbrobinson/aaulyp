<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PositionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $positions = $this->getPositions();



        foreach($positions as $position){
            $timesamp = time();
            DB::table('positions')->insert([
                'title' => $position['title'],
                'description' => $position['description'],
                'email' => $position['email'],
                'rank' => $position['rank'],
                'type' => $position['type'],
                'active' => $position['active'],
                'created_at' => date('Y-m-d H:i:s',$timesamp),
                'updated_at' => date('Y-m-d H:i:s',$timesamp),
            ]);
        }
    }

    protected function getPositions()
    {
        $positions = [
            [
                "title" => "President",
                "description" => "",
                "email" => "president.aaulyp@gmail.com",
                "rank" => 1,
                "type" => "officer",
                "active" => 1
            ],
            [
                "title" => "Vice President",
                "description" => "",
                "email" => "vicepresident.aaulyp@gmail.com",
                "rank" => 2,
                "type" => "officer",
                "active" => 1
            ],
            [
                "title" => "Secretary",
                "description" => "",
                "email" => "secretary.aaulyp@gmail.com",
                "rank" => 3,
                "type" => "officer",
                "active" => 1
            ],
            [
                "title" => "Treasuer",
                "description" => "",
                "email" => "treasuer.aaulyp@gmail.com",
                "rank" => 4,
                "type" => "officer",
                "active" => 1
            ],
            [
                "title" => "Communications Chair",
                "description" => "",
                "email" => "pr.aaulyp@gmail.com",
                "rank" => 5,
                "type" => "chair",
                "active" => 1
            ],
            [
                "title" => "Community Outreach",
                "description" => "",
                "email" => "community.aaulyp@gmail.com",
                "rank" => 6,
                "type" => "chair",
                "active" => 1
            ],
            [
                "title" => "Membership Chair",
                "description" => "",
                "email" => "membership.aaulyp@gmail.com",
                "rank" => 7,
                "type" => "chair",
                "active" => 1
            ],
            [
                "title" => "Professional Development Chair",
                "description" => "",
                "email" => "prodev.aaulyp@gmail.com",
                "rank" => 8,
                "type" => "chair",
                "active" => 0
            ],
        ];

        return $positions;
    }
}
