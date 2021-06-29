<?php

use App\ForumTopics as AppForumTopics;
use Illuminate\Database\Seeder;

class ForumTopics extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(AppForumTopics::class, 2)->create();
    }
}
