<?php

namespace App\Http\Controllers;

use App\Posts;
use Illuminate\Support\Facades\Auth;

class PreviewPost extends Controller
{
    public function show(Posts $post)
    {
        if (Auth::user()->is_admin || Auth::id() == $post->author_id) {
            return view('post.preview')->withArticle($post);
        }
    }

    public function action(Posts $post)
    {
        switch (request('action')) {
            case "approve":
                return $this->approve($post);
                break;
            case "reject":
                return $this->reject($post);
                break;
            default:
        }
    }

    public function approve($post)
    {
        $post->is_approved = 1;
        $post->save();
        return back()->withMessage("Post has been approved");
    }

    public function reject($post)
    {
        $post->is_approved = 0;
        $post->save();
        return back()->withMessage("Post has been rejected");
    }
}