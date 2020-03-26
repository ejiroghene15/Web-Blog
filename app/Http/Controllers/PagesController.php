<?php

namespace App\Http\Controllers;

use App\Categories;

class PagesController extends Controller
{
	function index()
	{
		return view('index');
	}

	function category($category)
	{
		$cat_id = Categories::where('category', $category)->value('id');
		$posts = Categories::find($cat_id)->posts()->get();
		return view('category', compact(['category', 'posts']));
	}
}