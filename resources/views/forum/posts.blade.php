@extends('forum.layout.master')
@section('title', config('app.name') ." | Forum - $name | ". $messages->first()->subject )

@section('body')

<div class="container-fluid">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb mb-0">
      <li class="breadcrumb-item"><a href="/" class="text-decoration-none">Home</a></li>
      <li class="breadcrumb-item"><a href="{{ url('forum') }}" class="text-decoration-none">Forums</a></li>
      <li class="breadcrumb-item"><a href="{{ url('forum', $name) }}" class="text-decoration-none">{{ $name }}</a>
      </li>
      <li class="breadcrumb-item active" aria-current="page">{{ $messages->first()->subject }}</li>
    </ol>
  </nav>

  <section class="reply my-4">
    <button class="btn btn-sm btn-info">Reply</button>
  </section>

  <div>

    {{-- main post --}}
    <div class="card-header bg-light text-dark d-flex">
      <aside class="mr-3">
        <img src="{{ $messages->first()->user->profilepix }}" class="rounded-circle" alt="" height="50" width="50">
      </aside>
      <section class="w-100">
        <h6>{{ $messages->first()->subject }}</h6>
        <b class="d-sm-flex justify-content-between">
          by {{ $messages->first()->user->name }}
          <span class="d-inline-block">
            <i class="fa fa-calendar-check-o"></i>
            {{ $messages->first()->date->format("D M j, Y g:i a") }}
          </span>
        </b>
        <article class="mt-3">
          {{ $messages->first()->body }}
        </article>
      </section>
    </div>

    {{-- replies --}}
    <div class="list-group">
      @forelse ($messages->skip(1) as $message)
      <div class="list-group-item list-group-item-action collapsible-categories text-light d-flex" aria-current="true">
        <aside class="mr-3">
          <img src="{{ $message->user->profilepix }}" class="rounded-circle" alt="" height="50" width="50">
        </aside>
        <section class="w-100">
          <h6>Re: {{ $message->subject }}</h6>
          <span class="d-sm-flex justify-content-between">
            by {{ $message->user->name }}
            <span class="d-inline-block">
              <i class="fa fa-calendar-check-o"></i>
              {{ $message->date->format("D M j, Y g:i a") }}
            </span>
          </span>
          <article class="mt-3">
            {{ $message->body }}
          </article>
        </section>
      </div>
      @empty
      @endforelse
    </div>

  </div>

  <section class="reply my-4">
    <button class="btn btn-sm btn-info">Reply</button>
  </section>

</div>
@endsection