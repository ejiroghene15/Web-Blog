<?php

namespace App\Http\Controllers;

use App\PostComments;
use App\PostLikes;
use App\Posts;
use App\PostViews;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class PostsController extends Controller
{

    public function create()
    {
        return view('post.create');
    }

    public function store()
    {
        $post = request()->validate([
            'cat_id' => 'required',
            'title' => 'required|unique:posts',
            'body' => 'required'
        ], [
            'cat_id.required' => "You have to select a category for your post",
            'title.unique' => "There's already a post with this title, please enter a different title for your post"
        ]);
        $post['author_id'] = Auth::id();
        $post['title_slug'] = str_slug($post['title'], '-');
        Posts::create($post);
        return redirect()->route('preview', $post['title_slug'])->withMessage("Your post has been created");
    }

    // * get the full post of an article along with its comments and related articles
    public function show($title)
    {
        $article = Posts::where([
            ['is_approved', '=', 1],
            ['title_slug', '=', $title]
        ])->firstOrFail();
        // no of views on a post, only users who are logged in
        if (Auth::check()) {
            $viewed_post = Posts::find($article->id)->view()->where('user_id', Auth::id())->count();
            if (!$viewed_post) {
                PostViews::firstOrCreate(['post_id' => $article->id, 'user_id' => Auth::id()]);
                Posts::where('id', $article->id)->increment('views');
            }
        }

        $related_articles = Posts::where('id', '<>', $article->id)
            ->inRandomOrder()
            ->take(2)
            ->get();
        return view('post.show')->with(compact('article', 'related_articles'));
    }

    public function comment(Posts $post)
    {
        $comment = request()->validate([
            'comment' => 'required'
        ], [
            'required' => "You can't post an empty comment"
        ]);

        $post->comments()->create(
            [
                "comment" => $comment['comment'],
                "user_id" => Auth::id()
            ]
        );
        return back();
    }

    public function react()
    {
        $hearts = request('hearts');
        $post_id = request('postid');
        $user_id = request('userid');

        $_has_reacted = Posts::find($post_id)->reaction()->where('user_id', $user_id)->count();
        if ($_has_reacted == 0) {
            PostLikes::firstOrCreate(['post_id' => $post_id, 'user_id' => $user_id]);
            Posts::where('id', $post_id)->increment('love');
        } else {
            if ($hearts == 1) {
                Posts::where('id', $post_id)->increment('love');
            } else {
                Posts::where('id', $post_id)->decrement('love');
                Posts::find($post_id)->reaction()->where('user_id', $user_id)->delete();
            }
        }
    }

    public function edit($title)
    {

        $article = Posts::where('title_slug', $title)->first();
        if (Gate::allows('update-post', $article)) {
            return view('post.edit')->with(compact('article'));
        } else {
            return back();
        }
    }

    public function update(Posts $post)
    {
        $slug = str_slug(request('title'), '-');
        $post['title_slug'] = $slug;
        $post->update(request()->validate([
            'cat_id' => 'required',
            'title' => 'required',
            'body' => 'required'
        ], [
            'cat_id.required' => "You have to select a category for your post",
        ]));
        return redirect()->route("preview", $slug)->withMessage("Your post has been updated");
    }

    public function destroy(Posts $post)
    {
        Posts::destroy($post);
        return back();
    }
}