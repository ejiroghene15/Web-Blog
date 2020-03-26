@extends('layouts.master')
@section('title', 'Admin | Categories')

@section('body')
<div class="col-md-4 col-lg-4 mx-auto">
	@if (session('message'))
	<div class="alert alert-success" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span class="fa fa-times-circle"></span>
		</button>
		<h6>{{ session('message') }}</h6>
	</div>
	@endif
	<div class="card border-0 text-dark" id="manage_categories">
		<nav>
			<div class="nav nav-tabs nav-fill border-0" id="nav-tab" role="tablist">
				<a class="nav-item nav-link active border-0 " id="add-cat-tab" data-toggle="tab" href="#add-cat" role="tab"
					aria-controls="nav-home" aria-selected="true"> <b> Add Category </b> </a>
				<a class="nav-item nav-link border-0" id="del-cat-tab" data-toggle="tab" href="#del-cat" role="tab"
                    aria-controls="nav-profile" aria-selected="false">
                    <b> Delete Category </b>
                </a>
			</div>
		</nav>

		<div class="tab-content" id="nav-tabContent">
			<div class="tab-pane fade show active" id="add-cat" role="tabpanel" aria-labelledby="nav-home-tab">
				<form action="{{ route('add_category') }}" method="post" class="card-body active">
					@csrf
					<div class="form-group">
						<label for="Name of category">
							Category Name
						</label>
						@error('category')
						<div class="invalid-feedback d-block">{{ $message }}</div>
						@enderror
						<input type="text" class="form-control" name="category">
					</div>
					<button type="submit" class="btn btn-success btn-sm">Add Category</button>
				</form>
			</div>
			<div class="tab-pane fade" id="del-cat" role="tabpanel" aria-labelledby="nav-profile-tab">
				<form action="{{ route('delete_category') }}" method="post" class="card-body">
					@csrf
					@method("DELETE")
					<div class="form-group">
						<label for="Name of category">
							Select category to delete
						</label>
						@error('category')
						<div class="invalid-feedback d-block">{{ $message }}</div>
						@enderror
						<select name="cat_id" class="form-control">
							@foreach ($categories as $category)
							<option value="{{$category->id}}">{{$category->category}}</option>
							@endforeach
						</select>
					</div>
					<button type="submit" class="btn btn-danger btn-sm">Delete Category</button>
				</form>
			</div>

		</div>

	</div>
</div>
@endsection
