@extends('layouts.master')
@section('title', config('app.name') ." | Admin")
@section('body')
<div class="col-md-12">

    <div class="row">
        <div class="col-md-3 mb-5 mb-lg-0 mb-md-0">
            <div class="card text-dark border-0">
                <div class="card-header">
                    <h5 class="m-0 h6">Admin Dashboard</h5>
                </div>
                <div class="list-group text-dark">
                    <a class="list-group-item d-flex justify-content-between align-items-center nav-link active rounded-0"
                        id="users-tab" data-toggle="tab" href="#users" role="tab" aria-controls="users"
                        aria-selected="true">
                        <span><img src="{{asset('images/team.png')}}" height="25" width="25" class="mr-1"> Users</span>
                        <span class="badge badge-primary badge-pill">{{count($users)}}</span>
                    </a>
                    <a class="list-group-item d-flex justify-content-between align-items-center nav-link" id="posts-tab"
                        data-toggle="tab" href="#posts" role="tab" aria-controls="posts" aria-selected="false">
                        <span><img src="{{asset('images/books.png')}}" height="25" width="25" class="mr-1"> Posts</span>
                        <span class="badge badge-primary badge-pill">{{count($posts)}}</span>
                    </a>
                    <a class="list-group-item d-flex justify-content-between align-items-center nav-link rounded-0"
                        id="categories-tab" data-toggle="tab" href="#categories" role="tab" aria-controls="categories"
                        aria-selected="false">
                        <span><img src="{{asset('images/label-tag.png')}}" height="25" width="25"
                                class="mr-1">Categories</span>
                        <span class="badge badge-primary badge-pill">{{count($categories)}}</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-9 tab-content">
            @if (session('message'))
            <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span class="fa fa-times-circle"></span>
                </button>
                <h6>{{ session('message') }}</h6>
            </div>
            @endif
            @include('admin.users')
            @include('admin.posts')
            @include('admin.categories')
        </div>

    </div>
</div>
@endsection

@section('scripts')
@parent
<script src='//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/js/materialize.min.js'></script>
<script src="js/datatable.js"></script>
@endsection
