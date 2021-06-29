<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Forums extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('forums')->insert([
            [
                "cat_id" => 1,
                "name" => "Comedy",
                "description" => "Films that make you laugh"
            ],
            [
                "cat_id" => 1,
                "name" => "Horror",
                "description" => "Movies that'll make you cringe"
            ],

        ]);
    }
}
