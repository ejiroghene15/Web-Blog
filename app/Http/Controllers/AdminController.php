<?php

namespace App\Http\Controllers;

use App\Categories;
use Illuminate\Http\Request;

class AdminController extends Controller
{
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
}