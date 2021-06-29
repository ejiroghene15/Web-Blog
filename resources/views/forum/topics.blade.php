@extends('forum.layout.master')
@section('title', config('app.name') ." | Forum - $name")

@section('body')

<div class="container-fluid">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb mb-0">
      <li class="breadcrumb-item"><a href="/" class="text-decoration-none">Home</a></li>
      <li class="breadcrumb-item"><a href="{{ url('forum') }}" class="text-decoration-none">Forums</a></li>
      <li class="breadcrumb-item active" aria-current="page">{{ $name }}</li>
    </ol>
  </nav>

  <section class="new_topic my-4">
    <a href="" class="btn btn-sm btn-info">New Topic</a>
  </section>

  <div>
    @if (count($topics))
    <div class="card-header bg-light py-4">
      <h6 class="text-dark m-0">Topics <span class="badge badge-dark">{{ count($topics) }}</span></h6>
    </div>

    <div class="list-group">
      @foreach ($topics as $topic)
      <a href="{{ route('forum_post', [$name, $topic->id]) }}"
        class="list-group-item list-group-item-action collapsible-categories text-light" aria-current="true">
        <div class="d-flex w-100 justify-content-between">
          <h6 class="my-1 align-self-center">{{ $topic->subject }} </h6>
          <div>
            <span> by {{ $topic->user->name }}</span>
            <h6 class="my-1">
              <small><i class="fa fa-book"></i> {{ $topic->messages->count() }}</small>
              <small class="ml-2">
                <i class="fa fa-calendar-o"></i>
                {{ $topic->date->format("jS M Y") }}
              </small>
            </h6>
          </div>
        </div>
      </a>
      @endforeach
    </div>
    @else
    <div class="card-header bg-light rounded py-4">
      <h6 class="text-dark m-0">No Topic Found, Create a new topic under this category</h6>
    </div>
    @endif

  </div>

  <section class="new_topic my-4">
    <a href="" class="btn btn-sm btn-info">New Topic</a>
  </section>

</div>
@endsection