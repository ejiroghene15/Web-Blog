<?php

namespace App\Http\Controllers;

use App\Posts;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function archive()
    {
        // get all the post created by the user
        $post = Posts::find(1)->where("author_id", Auth::id())->get();
        return view('archive')->with(compact('post'));
    }

    public function show()
    {
        $profile = User::findOrFail(Auth::id());
        return view('profile')->with(compact('profile'));
    }

    public function update(Request $request)
    {
        Validator::make($request->all(), [
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
        ])->validate();

        User::where('email', Auth::user()->email)->update([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'bio' => $request->bio,
            'facebook' => $request->fb_link,
            'twitter' => $request->tw_link
        ]);
        return back();
    }
}
