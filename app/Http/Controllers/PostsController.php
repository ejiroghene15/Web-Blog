<?php

namespace App\Http\Controllers;

date_default_timezone_set('Africa/Lagos');

use App\PostComments;
use App\PostLikes;
use App\Posts;
use App\PostViews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('newpost');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $post = $request->all();
        Validator::make($post, [
            'cat_id' => 'required',
            'title' => 'required|unique:posts',
            'body' => 'required'
        ], [
            'cat_id.required' => "Please select a category"
        ])->validate();
        $post['author'] = $user->name;
        $post['author_id'] = $user->id;
        Posts::create($post);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // * get the full post of an article along with its comments and related articles
    public function show($title)
    {
        // ? remove the dashes added to the title of the post
        $title = str_replace('-', ' ', $title);
        $article = Posts::where('title', $title)->first();

        // no of views on a post, only users who are logged in
        if (Auth::check()) {
            $viewed_post = Posts::find($article->id)->view()->where('user_id', auth()->id())->count();
            if (!$viewed_post) {
                PostViews::firstOrCreate(['post_id' =>  $article->id, 'user_id' => auth()->id()]);
                Posts::where('id', $article->id)->increment('views');
            }
        }

        $related_articles = Posts::where('title', '<>', $title)->get();
        return view('article')->with(compact('article', 'related_articles'));
    }

    public function comment(Request $request)
    {
        $user = Auth::user();
        $comment = $request->all();
        Validator::make($comment, [
            'comment' => 'required'
        ], [
            'comment.required' => "You can't post an empty comment"
        ])->validate();
        $comment['user_id'] = $user->id;
        PostComments::create($comment);
        return back();
    }

    public function react(Request $request)
    {
        $hearts = $request->hearts;
        $post_id = $request->postid;
        $user_id = $request->userid;

        $_has_reacted = Posts::find($post_id)->reaction()->where('user_id', $user_id)->count();
        if ($_has_reacted == 0) {
            PostLikes::firstOrCreate(['post_id' =>  $post_id, 'user_id' => $user_id]);
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($title)
    {
        // ? remove the dashes added to the title of the post
        $title = str_replace('-', ' ', $title);
        $article = Posts::where('title', $title)->first();
        if (Gate::allows('update-post', $article)) {
            return view('editpost')->with(compact('article'));
        } else {
            echo "You can't edit this post";
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Validator::make($request->all(), [
            'cat_id' => 'required',
            'title' => 'required',
            'body' => 'required'
        ], [
            'cat_id.required' => "Please select the category this post belongs to"
        ])->validate();
        Posts::where('id', $id)->update(['title' => $request->title, 'cat_id' => $request->cat_id, 'body' => $request->body]);
        return redirect()->route('article', ['title' => str_replace(' ', '-', $request->title)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Posts::destroy($id);
        return back();
    }
}
