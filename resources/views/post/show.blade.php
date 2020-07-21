<!doctype html>
<html>

	<head>
		<meta charset="UTF-8">
		<meta name="viewport"
			content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">

		<meta name="twitter:card" content="summary_large_image">
		<meta property="og:url" content="" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="" />
		<meta property="og:description" content=" " />
		<meta property="og:image" content="" />
		<meta property="og:image:width" content="750" />
		<meta property="og:image:height" content="750" />
		<meta name="msapplication-TileColor" content="#b98e55">
		<meta name="theme-color" content="#804c09">
		<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="mobile-web-app-capable" content="yes">
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<link rel="icon" href="{{ asset('images/logo.png') }}" type="image/x-icon" />
		<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
		<link href="https://fonts.googleapis.com/css?family=Alegreya+Sans&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Rubik&display=swap" rel="stylesheet">
		<title>@yield( "title", config('app.name') ." | $article->title")</title>
		<link rel="stylesheet" href="/css/bootstrap.min.css">
		<link rel="stylesheet" href="/css/fa/css/font-awesome.min.css">
		<link rel="stylesheet" href="/css/custom.css">
		<link rel="stylesheet" href="/css/main.css">
		{{-- <link rel="stylesheet" href="/css/gisthub.css"> --}}
	</head>

	<body class="m-0 position-absolute h-100  w-100 d-flex flex-column">

		<main class="gh-main text-light">
			@include('layouts.nav')
			<div style="height: 50px"></div>
			@include('layouts.sidebar')
			<div id="main-body">

				<div id="article-container">
					<div class="row mx-0 px-md-5 justify-content-around">
						<div class="col-md-8 mx-auto">
							@if (session('message'))
							<div class="alert alert-success" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span class="fa fa-times-circle"></span>
								</button>
								<h6>{{ session('message') }}</h6>
							</div>
							@endif
							<div class="article">
								<article class="card border-0">

									<section class=" card-header">
										<div class="d-flex justify-content-between align-items-start mb-1 p-2">
											<p class="h5 heading m-0">{{$article->title}}</p>
											<p class="category badge badge-info p-2 m-0 gc-p">
												{{$article->category->category}}
											</p>
										</div>
										<div class="d-flex">
											<img src="{{$article->user->profilepix}}" class="rounded-circle" height="40" width="40">
											<div class="d-inline-block pl-2 w-100 author">
												<p class="m-0  border-bottom" style="border-color: #9ca5ad42">
													{{$article->user->name}}
												</p>
												<p class="m-0">{{ $article->created_at->format("D jS F Y")}}
												</p>
											</div>
										</div>
									</section>

									<section class="card-body text-dark ck-content">
										<div class="card-text text-justify"> {!! $article->body !!} </div>
									</section>

									<section class="card-footer d-flex justify-content-between">
										{{-- toggle comment button --}}
										<button type="button" class="btn btn-sm btn-light">
											<span style="font-size: 1em">Comments</span> <span
												class="ml-1 badge badge-dark">
												{{ $article->comments->count() }}
											</span>
										</button>


										<div class="align-self-center">
											<span class="badge badge-info gc-p badge-pill reactions icon_eye p-2 mr-1">
												<i class="fa fa-eye mr-1"></i>{{$article->views}}
											</span>

											<span class="badge badge-danger badge-pill reactions icon_heart p-2">
												{{-- a check is done to see if the user has reacted on the post --}}
												@auth
												@if (count(collect($article->reaction)->where('user_id', auth()->id()))
												==
												1)
												<i class="fa fa-heart mr-1"></i>
												@else
												<i class="fa fa-heart-o mr-1"></i>
												@endif
												@else
												<span class="fa fa-heart-o mr-1"></span>
												@endauth
												{{-- close check --}}
												<span id="no_of_hearts">{{$article->love}}</span>
												<span class="d-none" id="article_id"> {{$article->id}} </span>
												<span class="d-none" id="user_id"> {{auth()->id()}} </span>
											</span>

										</div>
									</section>
									<div class="card-body py-3 pb-0 d-flex justify-content-between">
										<div>
											<a href=""><img src="{{ asset('img/facebook.png') }}" class="mr-2" alt=""
													height="30" width="30"></a>
											<a href=""><img src="{{ asset('img/whatsapp.png') }}" class="mr-2" alt=""
													height="35" width="35"></a>
											<a href=""><img src="{{ asset('img/twitter.png') }}" class="mr-2" alt=""
													height="30" width="30"></a>
										</div>
										@can('update-post', $article)
										{{-- display edit button if the person logged in is the creator of the post --}}
										<a class="btn btn-sm btn-info gh-btn align-self-baseline"
											style="font-size: 1em!important"
											href="{{ route('edit_post', $article->title_slug) }}">Edit
											post</a>
										@endcan
									</div>
									{{-- close auth check for post author --}}
									<div class="card-body pt-2">
										@auth
										<form method="post">
											@csrf
											<details open>
												<summary class="border-0 text-dark"><label for="">Leave a
														Comment</label>
												</summary>
												@error('comment')
												<div class="invalid-feedback d-block">{{ $message }}</div>
												@enderror
												<input type="hidden" name="post_id" value="{{$article->id}}">
												<textarea class="form-control" rows="6" name="comment"></textarea>
												<button type="submit" class="btn btn-success gh-btn mt-3"
													name="post_comment">Post
													comment
												</button>
											</details>
										</form>
										@else
										<a class="text-info card-link" href="/login"> <b class="lead"
												style="font-size: 17px; color:#804c09">Login to
												leave a comment</b> </a>
										@endauth
									</div>
								</article>
							</div>
							{{-- comments on post --}}

							@if ($article->comments->count() > 0)
							<section id="comment-box" class="card mt-5">
								<div class=" card-header">
									<h5 class="lead m-0" style="font-size: 16px">Comments</h5>
								</div>
								<div class="list-group">
									@foreach (collect($article->comments)->sortByDesc('date') as $comment)

									<div class="list-group-item list-group-item-action">

										<div class="d-flex">
											<section for="avatar" class="mr-2 pr-1 mt-n1">
												<img src="{{ $comment->user->profilepix}}" class="rounded-circle"
													height="40" width="40">
											</section>
											<section for="comment">
												<p class="mb-1 h6 lead comment-name">
													{{ $comment->user->name }} </p>
												<p class="mb-1">{{ $comment->comment }} </p>
												<h6 style="font-size: 14px">
													<span class="fa fa-clock-o"></span>
													{{$comment->date->format("jS F Y @ h:ia")}}
												</h6>
											</section>
										</div>

									</div>

									@endforeach
								</div>
								@endif
							</section>

							{{-- close comments box --}}

						</div>

						{{-- related posts --}}
						@if (count($related_articles) > 0)
						<aside id="relatedposts" class="col-md-4 my-md-0 my-5 align-self-baseline">
							<div class="card">
								<div class=" card-header">
									<h5 class="lead m-0">Related articles</h5>
								</div>
								<div class="list-group">
									@forelse ($related_articles as $rp)
									<a href="{{ route('article',  $rp->title_slug) }}"
										class="list-group-item list-group-item-action">
										<div>
											<p class="mb-1 h5  lead title text-capitalize"> {{ $rp->title }} </p>
										</div>
										<p class="mb-1 text-capitalize"><span
												class="fa fa-user-o mr-2"></span>{{ $rp->user->name }}
										</p>
										<p class="m-0">
											<span class="fa fa-calendar-check-o mr-2"></span>
											{{ $rp->created_at->format("D jS M Y")}}
										</p>
									</a>
									@empty
									<h5>No related posts</h5>
									@endforelse
								</div>
							</div>
						</aside>
						@endif
					</div>
				</div>
			</div>
		</main>

		 @include('layouts.footer')

		@include('layouts.scripts')
		<script charset="utf-8" src="//cdn.iframe.ly/embed.js?api_key=76bce2100b43771fc13ef6"></script>
		<script src="/js/main.js"></script>

	</body>

</html>
