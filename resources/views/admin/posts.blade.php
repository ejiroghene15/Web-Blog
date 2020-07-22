<div class="tab-pane fade" id="posts" role="tabpanel" aria-labelledby="posts-tab">
	<div class="card text-dark">
		<div class="card-body">
			<div class="table-responsive material-table">
				<div class="d-flex justify-content-between">
					<h5 class="card-title">Posts</h5>
					<span class="search-toggle"><i class="material-icons">search</i></span>
				</div>
				<table class="table dt">
					<thead class="d-none">
						<tr>
							<th>ID</th>
							<th>Posts</th>
						</tr>
					</thead>
					@foreach ($posts as $post)
					<tr>
						<td class="d-none">{{$post->id}}</td>
						<td class="d-flex px-1">
							<span class="d-none">{{$post->created_at}}</span>
							@if ($post->is_approved == 1)
							<span class="protip mr-1 align-self-center" data-pt-title="post approved"
								data-pt-scheme="leaf" data-pt-position="top" data-pt-trigger="click"
								style="font-size: 10px">
								<i class="fa fa-2x fa-check-circle text-success"></i>
							</span>
							@elseif($post->is_approved == 2)
							<span class="protip mr-1 align-self-center" data-pt-title="pending approval"
								data-pt-scheme="dark" data-pt-position="top" data-pt-trigger="click"
								style="font-size: 10px">
								<i class="fa fa-2x fa-question-circle text-warning"></i>
							</span>
							@else
							<span class="protip mr-1 align-self-center" data-pt-title="post rejected"
								data-pt-scheme="red" data-pt-position="top" data-pt-trigger="click"
								style="font-size: 10px">
								<i class="fa fa-2x fa-times-circle text-danger"></i>
							</span>
							@endif
							<img src="{{$post->user->profilepix}}" class="rounded-circle" alt="" height="50" width="50">
							<div class="ml-2">
								<p class="m-0">
									<a href="{{ route('article', $post->title_slug)}}" target="_blank"
										class="text-dark text-decoration-none h6">
										<span class="p-color text-capitalize">{{strtolower($post->title)}}</span>
									</a>
								</p>
								<p class="m-0 text-capitalize"> {{$post->user->name}} </p>
								<p class="m-0">
									{{ $post->created_at->format('D jS F Y')}}
									<a class="ml-1 protip" href="{{ route('preview', $post->title_slug) }}"
										target="_blank" data-pt-title="preview post" data-pt-scheme="dark"
										data-pt-position="top">
										<i class="fa fa-external-link"></i></a>
								</p>
							</div>
							<div class="d-flex flex-column justify-content-between ml-auto">
								<span>
									<i class='material-icons' style="font-size: 17px"> visibility </i>
									<b class="p-color" style="vertical-align:top">{{$post->views}}</b>
								</span>
								<span>
									<i class='material-icons' style="font-size: 17px"> comment </i>
									<b class="p-color" style="vertical-align:top">{{$post->comments->count()}}</b>
								</span>
							</div>
						</td>
					</tr>
					@endforeach
				</table>
			</div>
		</div>
	</div>
</div>
