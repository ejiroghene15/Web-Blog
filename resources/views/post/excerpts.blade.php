@auth
@if (!empty($excerpts))
<div class=" position-fixed h-100 d-flex justify-content-end align-items-center" style=" top:0; right: 5px; z-index:4">
    <div class="pull-right">
        <a class="fa-stack h4 text-light protip" href="/newpost" data-pt-title="New post" data-pt-scheme="dark" data-pt-animate="bounceIn">
            <i class="fa fa-circle fa-stack-2x"></i>
            <i class="fa fa-pencil fa-stack-1x bg-primary rounded-circle"></i>
        </a>
    </div>
</div>
@endif
@endauth
<div class="row col-md-10 px-0 mx-auto">
    <div class="excerpts col-md-8 mx-auto ">
        @forelse ($excerpts as $excerpt)
        <article class="card mb-5 border-0">
            <section class=" card-header pb-1 px-3">
                <div class="d-flex justify-content-between align-items-start mb-2 p-2">
                    <p class="heading m-0">{{$excerpt->title}}</p>
                    <p class="category badge p-2 m-0 gc-p">{{$excerpt->category->category}}</p>
                </div>
                <div class="d-flex mb-2">
                    <img src="{{ $excerpt->user->profilepix }}" class="rounded-circle" height="40" width="40">
                    <div class="d-inline-block pl-2 w-100 author">
                        <p class="m-0 border-light border-bottom">{{$excerpt->user->name}}</p>
                        <p class="m-0">{{ $excerpt->created_at->format("D jS F Y")}}</p>
                    </div>
                </div>
            </section>

            <section class="card-body p-3 text-dark">
                <div class="card-text text-justify">{!! $featured($excerpt->body, 400) !!}</div>
            </section>

            <section class="card-footer d-flex justify-content-between px-3">
                {{-- add dashes to the title of the post to make it more readabke --}}
                <a href="{{ route('article', $excerpt->title_slug) }}"
                    class="badge badge-success p-2 continue-reading float-left">Continue reading &raquo;</a>
                <div>
                    <span class="badge badge-pill reactions icon_eye mr-1 p-2">
                        <i class="fa fa-eye mr-1"></i>{{$excerpt->views}}
                    </span>
                    <span class="badge badge-danger badge-pill reactions p-2">
                        <i class="fa fa-heart mr-1"></i>{{$excerpt->love}}
                    </span>
                </div>
            </section>
        </article>

        @empty


        <div class="jumbotron card-bg text-center">
            <p class="lead">No posts created yet. Create your first post
                <a class="fa-stack h5 text-light" href="/newpost">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-pencil text-dark fa-stack-1x  rounded-circle"></i>
                </a>
            </p>
        </div>


        @endforelse
    </div>

    {{-- related posts --}}
    @if ((count($relatedposts) > 0))
    <aside id="relatedposts" class="col-md-4 my-md-0 my-5 align-self-baseline">
        <div class=" card mb-3">
            <div class=" card-header">
                <h5 class=" lead m-0">Recent Posts</h5>
            </div>
            <div class="list-group">

                @forelse ($relatedposts as $rp)
                <a href="{{ route('article', ['title'=> str_replace(' ', '-', $rp->title) ]) }}"
                    class="list-group-item list-group-item-action">
                    <div>
                        <p class="mb-1 h5  lead title text-capitalize"> {{ $rp->title }} </p>
                    </div>
                    <p class="mb-1 text-capitalize"><span class="fa fa-user-o mr-2"></span>{{ $rp->user->name }}
                    </p>
                    <p class="m-0">
                        <span class="fa fa-calendar-check-o mr-2"></span>
                        {{ $rp->created_at->format("D jS M Y")}}
                    </p>
                </a>
                @empty
                <h5 class="px-3">No recent posts</h5>
                @endforelse
            </div>
        </div>
    </aside>
    <div class="mx-auto"> {{$excerpts->onEachSide(5)->links() }} </div>
    @endif
</div>
