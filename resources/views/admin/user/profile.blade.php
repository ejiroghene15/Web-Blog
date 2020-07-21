@extends('layouts.master')
@section('title', "Gisthub | Admin")
@section('body')

<div class="col-md-12">
    <div class="row">
        <div class="col-sm-4">
            <div class="card text-dark border-0">
                <div class="card-header">
                    <h6 class="card-title m-0 d-flex justify-content-between">
                        <span>
                            <a href="/admin" class="text-dark"><i class="fa fa-long-arrow-left mr-2"></i></a>
                            <span class="text-capitalize">{{$user->username}}</span>
                        </span>
                        @if (($user->lastseen))
                        <small class="align-self-end">
                            <span class=" fa fa-eye mr-1"></span>{{$user->lastseen->diffForHumans()}}
                        </small>
                        @endif
                    </h6>
                </div>

                <div class="list-group text-dark">
                    <a class="list-group-item d-flex justify-content-between align-items-center nav-link active rounded-0"
                        id="profile-tab" data-toggle="tab" href="#prf" role="tab" aria-controls="profile"
                        aria-selected="true">
                        Profile
                    </a>
                    <a class="list-group-item d-flex justify-content-between align-items-center nav-link"
                        id="articles-tab" data-toggle="tab" href="#articles" role="tab" aria-controls="articles"
                        aria-selected="false">
                        <span>Posts</span>
                        <span class="badge badge-primary badge-pill">{{count($user->posts)}}</span>
                    </a>
                    <a class="list-group-item d-flex justify-content-between align-items-center nav-link rounded-0"
                        id="action-tab" data-toggle="tab" href="#action" role="tab" aria-controls="action"
                        aria-selected="false">
                        Action
                    </a>
                </div>

            </div>
        </div>

        <div class="col-md-8 tab-content">
            @if (session('message'))
            <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span class="fa fa-times-circle"></span>
                </button>
                <h6>{{ session('message') }}</h6>
            </div>
            @endif
            @include('admin.user.bio')
            @include('admin.user.articles')
            @include('admin.user.actions')
        </div>

    </div>
</div>
@endsection


@section('scripts')
@parent
<script src='//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/js/materialize.min.js'></script>
<script src="/js/datatable.js"></script>
@endsection
