@extends('layouts.master')
@section('title', config('app.name') ." | $category")

@section('body')
<ul>
	@forelse ($posts as $post)
	<li>{{$post->title}}</li>
	@empty
	Sorry, no post have been created on for this category. Be the first to create one.
	@endforelse
</ul>
@endsection
