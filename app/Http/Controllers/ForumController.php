<?php

namespace App\Http\Controllers;

use App\ForumCategories;
use App\ForumMessages;
use App\Forums;
use App\ForumTopics;
use Illuminate\Support\Facades\DB;

class ForumController extends Controller
{
    public function index()
    {
        $categories = ForumCategories::all();
        return view("forum.index")->withCategories($categories);
    }

    public function show(Forums $forum)
    {
        $topics = ForumTopics::where("forum_id", $forum->id)
            ->leftJoin('forum_messages', 'forum_topics.id', '=', 'forum_messages.topic_id')
            ->select('forum_messages.topic_id', 'forum_topics.*', DB::raw('MAX(forum_messages.date) as maxdate'))
            ->groupBy('forum_messages.topic_id')
            ->latest('maxdate')
            ->get();
        return view("forum.topics")->withTopics($topics)->withName($forum->name);
    }

    public function messages($forum, $topic_id)
    {
        $messages = ForumMessages::where('topic_id', $topic_id)->get();
        return view('forum.posts')->withMessages($messages)->withName($forum);
    }
}
