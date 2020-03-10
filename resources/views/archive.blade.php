@extends('layouts.master')
@section('title', "Gisthub | Archive")
@section('body')
<div class="archive">
    <div class="col-md-8 mx-auto">
        <div class="card gc-p">
            <div class="card-header">
                <h5 class="card-title mb-1"> <i class="fa fa-archive mr-1"></i> Archive</h5>
                <p class="m-0" style="font-size: 1.1em">Here in your archive, you can manage your contents</p>
            </div>
            <div class="list-group">
                @forelse ($post as $ac)
                <div class="list-group-item list-group-item-action">
                    @csrf
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1"> {{ $ac->title}} </h5>
                    </div>
                    <p class="mb-1">{{ date("D jS F Y ", strtotime($ac->created_at))}}</p>
                    <a href="{{ route('article', ['title'=> str_replace(' ', '-', $ac->title) ]) }}"
                        class="btn btn-sm btn-success gh-btn mr-1"><i class="fa fa-eye mr-1"></i>View</a>
                    <a href="{{ route('edit_post', ['title' => str_replace(' ', '-', $ac->title) ]) }}"
                        class="btn btn-sm gc-p text-light gh-btn mr-1"><i class="fa fa-edit mr-1"></i>Edit</a>
                    <form class="d-inline-block" action="{{ route('deletepost', ['id' => $ac->id])}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <input type="hidden" name="id" value="{{ $ac->id }}">
                        <button type="submit" class="btn btn-sm btn-danger gh-btn">
                            <i class="fa fa-trash mr-1"></i>Delete</button>
                    </form>
                </div>
                @empty
                <h5 class="card-body py-2">Your archive is empty</h5>
                @endforelse
            </div>
        </div>
        <div class="text-center my-3"><a href="{{ url()->previous() }}" style="
            font-size: 14px;" class="btn btn-info text-center"> <i class="fa fa-long-arrow-left"></i> Go Back </a>
        </div>
    </div>
</div>
@endsection
