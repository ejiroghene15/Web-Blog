@extends('forum.layout.master')
@section('title', config('app.name') ." | Forum")
@section('body')

<div class="container-fluid">
    <div class="list-group mt-5">
        @foreach ($categories as $category)
        <a href="#" class="list-group-item list-group-item-action collapsible-categories text-light"
            aria-current="true">
            <div class="d-flex w-100 justify-content-between">
                <h6 class="my-1">{{ $category->name }}</h6>
            </div>
            <p class="mb-1"></p>

            @forelse ($category->forums as $forum)
            <a href="{{ route('forum_name', $forum->name) }}" class="list-group-item list-group-item-action"
                aria-current="true">
                <section class="d-flex">
                    <div>
                        <label for="forum">{{ $forum->name }}</label>
                        <p class="mb-1"></p>
                        <p style="font-size: 14px" class="m-0">{{ $forum->description }}</p>
                    </div>
                    <div class="ml-auto">
                        <div class="mb-2">
                            <span class="mr-1">{{ $forum->topics->count() }}</span> Topics
                        </div>
                        <div>
                            <span class="mr-1">
                                {{
                $forum->topics->sum(function ($topic) {
                  return $topic->messages->count();
                    })
                }} </span> Posts
                        </div>
                    </div>
                </section>
            </a>
            @empty
            <a href="#" class="list-group-item list-group-item-action" aria-current="true">
                <p class="mb-1"></p>
                No Forum!!
            </a>
            @endforelse
        </a>
        @endforeach
    </div>

</div>
@endsection