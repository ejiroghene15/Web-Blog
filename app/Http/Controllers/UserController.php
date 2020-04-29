<?php

namespace App\Http\Controllers;

use App\Posts;
use App\User;
use Cloudinary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }

    public function verifyAccount(Request $request)
    {
        User::where([
            'verification_token' => $request->query('vtk')
        ])->update(
            [
                'email_verified_at' => now(),
                'account_status' => 'active'
            ]
        );
        return redirect('login')->with('message', 'Your account has been verified, you can now login');
    }

    public function archive()
    {
        // get all the post created by the user
        $post = [];
        if (Posts::exists()) {
            $post = Posts::latest()->where("author_id", auth()->id())->simplePaginate(10);
        }
        return view('archive')->withPost($post);
    }

    public function show()
    {
        $profile = User::findOrFail(auth()->id());
        return view('profile')->withProfile($profile);
    }

    public function update(Request $request)
    {
        Validator::make($request->all(), [
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
        ])->validate();

        $img_path = auth()->user()->profilepix;
        if ($request->hasFile('profilephoto')) {
            $img_name = pathinfo($request->file('profilephoto')->getClientOriginalName())['filename'];
            $img_path = Cloudinary\Uploader::upload($request->file('profilephoto'), [
                "folder" => "profilephotos",
                "public_id" => $img_name
            ])['secure_url'];
        }

        User::where('email', auth()->user()->email)->update([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'profilepix' => $img_path,
            'bio' => $request->bio,
            'facebook' => $request->fb_link,
            'twitter' => $request->tw_link
        ]);
        return back()->with("message", "Profile updated");
    }
}