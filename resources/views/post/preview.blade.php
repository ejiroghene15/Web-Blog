@extends('layouts.master')
@section('title', config('app.name') ." | Preview Post")
@section('body')

<div id="article-container">
  <div class="row mx-0 px-md-5 justify-content-around">
    <div class="col-md-8 mx-auto">
      @if (session('message'))
      <div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span class="fa fa-times-circle"></span>
        </button>
        {{ session('message') }}
      </div>
      @endif

      <div class="card bg-dark border-o">
        <div class="card-header">
          <h6>
            @if ($article->is_approved == 1)
            <small class="btn btn-sm btn-success">Post approved</small>
            @elseif($article->is_approved ==2)
            <small class="btn btn-sm btn-info">Pending approval</small>
            @endif
          </h6>
          <h6 class="card-title m-0">
            This is a preview of the post
          </h6>
        </div>
        <div class="article">
          <article class="card border-0">

            <section class=" card-header">
              <div class="d-flex justify-content-between align-items-start mb-1">
                <p class="h5 heading m-0">{{$article->title}}</p>
                <p class="category badge badge-info p-2 m-0 gc-p">
                  {{$article->category->category}}
                </p>
              </div>
              <div class="d-flex">
                <img src="/images/body.jpg" class="rounded-circle" height="40" width="40">
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

            <div class="card-body py-3 pb-0 d-flex justify-content-between">

              @can('update-post', $article)
              {{-- display edit button if the person logged in is the creator of the post --}}
              <a class="btn btn-sm btn-info gh-btn align-self-baseline" style="font-size: 1em!important"
                href="{{ route('edit_post', $article->title_slug) }}">Edit
                post</a>
              @endcan
            </div>
            {{-- close auth check for post author --}}

          </article>
        </div>
      </div>

    </div>

    {{-- related posts --}}
    @if (auth()->user()->is_admin)
    <div class="col-md-4 my-md-0 my-5">
      <form action="" method="post" class="card bg-dark">
        @csrf
        <div class="card-body">
          <div class="form-group">
            <label for="">Message</label>
            <textarea name="mail_message" rows="8" class="form-control bg-transparent border-0"
              placeholder="Enter message for any of the action below"></textarea>
          </div>

          <button type="submit" name="action" value="approve" class="btn btn-sm btn-success">
            Approve post
          </button>

          <button type="submit" name="action" value="reject" class="btn btn-sm btn-danger">
            Reject post
          </button>
        </div>
      </form>
    </div>
    @endif
  </div>
</div>


@endsection

@section('scripts')
@parent
<script charset="utf-8" src="//cdn.iframe.ly/embed.js?api_key=76bce2100b43771fc13ef6"></script>
@endsection
