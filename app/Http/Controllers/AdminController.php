<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Posts;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    function index()
    {
        return view("admin")
            ->withUsers(User::all())
            ->withPosts(Posts::all());
    }

    function addCategory(Request $request)
    {
        $category = $request->validate([
            'category' => 'required|unique:categories',
        ], [
            'required' => 'Please enter a :attribute name',
            'unique' => 'This :attribute already exists'
        ]);
        Categories::create($category);
        return back()->with('message', 'New category created');
    }

    function deleteCategory(Request $request)
    {
        Categories::destroy($request->cat_id);
        return back()->with('message', 'Category deleted');
    }

    function userProfile(User $user)
    {
        return view('admin.user.profile')->withUser($user);
    }

    function userAccount(User $user)
    {
        switch (request('action')) {
            case "lock":
                return $this->lockAccount($user);
                break;
            case "unlock":
                return $this->unlockAccount($user);
                break;
            case "delete":
                return $this->deleteAccount($user);
                break;
            default:
        }
    }

    function lockAccount($user)
    {
        $user->account_status = "blocked";
        $user->save();
        return back()->withMessage("Account suspended");
    }

    function unlockAccount($user)
    {
        $user->account_status = "active";
        $user->save();
        return back()->withMessage("Account unsuspended");
    }

    function deleteAccount(User $user)
    {
        $user->delete();
        return redirect('/admin')->withMessage("User account has been deleted successfully");
    }

}