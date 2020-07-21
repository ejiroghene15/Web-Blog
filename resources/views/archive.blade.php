@extends('layouts.master')
@section('title', config('app.name') ." | Archive")
@section('body')
<div class="archive">
	<div class="col-md-8 mx-auto">
		<div class="card card-bg text-light border-0">
			<div class="card-body">
				<div class="table-responsive material-table">
					<div class="d-flex">
						<h5 class="card-title mb-1" style="font-size: 18px"> <i class="fa fa-archive mr-1"></i>
							Archive
						</h5>
						<span class="search-toggle ml-auto"><i class="material-icons">search</i></span>
					</div>
					<table class="table dt">
						<thead class="d-none">
							<tr>
								<th>ID</th>
								<th>Posts</th>
							</tr>
						</thead>
						@foreach ($post as $ac)
						<tr class="text-light">
							<td class="d-none">{{$ac->id}}</td>
							<td class="d-flex px-1">
								<span class="d-none">{{$ac->created_at}}</span>
								@if ($ac->is_approved == 1)
								<span class="protip mr-1 align-self-center" data-pt-title="post approved"
									data-pt-scheme="leaf" data-pt-position="top" data-pt-trigger="click"
									style="font-size: 10px">
									<i class="fa fa-2x fa-check-circle text-success"></i>
								</span>
								@elseif($ac->is_approved == 2)
								<span class="protip mr-1 align-self-center" data-pt-title="pending approval"
									data-pt-scheme="dark" data-pt-position="top" data-pt-trigger="click"
									style="font-size: 10px">
									<i class="fa fa-2x fa-question-circle text-warning"></i>
								</span>
								@else
								<span class="protip mr-1 align-self-center" data-pt-title="post rejected"
									data-pt-scheme="purple" data-pt-position="top" data-pt-trigger="click"
									style="font-size: 10px">
									<i class="fa fa-2x fa-times-circle text-danger"></i>
								</span>
								@endif
								<img src="{{$ac->user->profilepix}}" class="rounded-circle" alt="" height="50"
									width="50">
								<div class="ml-2">
									<p class="m-0 h6">
										<a href="{{ route('article', $ac->title_slug)}}" target="_blank"
											class="text-dark text-decoration-none">
											<span class="text-light">{{$ac->title}}</span>
										</a>
									</p>
									<p class="m-0 mb-1">
										<small class="p-color">{{ $ac->created_at->format('D jS F Y')}}</small>
										<a class="ml-1 protip" href="{{ route('preview', $ac->title_slug) }}"
											target="_blank" data-pt-title="preview post" data-pt-scheme="dark"
											data-pt-position="top">
										</a>
									</p>
									<a href="{{ route('edit_post', $ac->title_slug) }}"
										class="btn btn-sm btn-info gh-btn mr-1"><i class="fa fa-edit mr-1"></i>Edit</a>
									<form class="d-inline-block" action="{{ route('deletepost', ['post' => $ac->id])}}"
										method="POST">
										@method('DELETE')
										@csrf
										<input type="hidden" name="id" value="{{ $ac->id }}">
										<button type="submit" class="btn btn-sm btn-danger gh-btn">
											<i class="fa fa-trash mr-1"></i>Delete</button>
									</form>

								</div>
								<div class="d-flex flex-column justify-content-around ml-auto pl-3">
									<span>
										<i class='material-icons' style="font-size: 17px"> visibility </i>
										<b class="p-color" style="vertical-align:top">{{$ac->views}}</b>
									</span>
									<span>
										<i class='material-icons' style="font-size: 17px"> comment </i>
										<b class="p-color" style="vertical-align:top">{{$ac->comments->count()}}</b>
									</span>
								</div>
							</td>
						</tr>
						@endforeach
					</table>
				</div>
			</div>
		</div>

		<div class="text-center my-3"><a href="{{ url()->previous() }}" style="
			font-size: 14px;" class="btn btn-info text-center"> <i class="fa fa-long-arrow-left"></i> Go Back </a>
		</div>
	</div>
</div>
@endsection

@section('footer')
<div class="d-none d-md-block d-lg-block" style="z-index:10">@parent</div>
@endsection

@section('scripts')
@parent
<script src='//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/js/materialize.min.js'></script>
<script src="js/datatable.js"></script>
@endsection
