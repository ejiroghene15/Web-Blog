<?php

use App\ForumMessages as AppForumMessages;
use Illuminate\Database\Seeder;

class ForumMessages extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(AppForumMessages::class)->create();
    }
}
