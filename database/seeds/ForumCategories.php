<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ForumCategories extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('forum_categories')->insert([
            ["name" => "Movies"],
            ["name" => "Documentaries"]
        ]);
    }
}
