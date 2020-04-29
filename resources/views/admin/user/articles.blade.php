<div class="tab-pane fade" id="articles" role="tabpanel" aria-labelledby="articles-tab">
    <div class="card text-dark">
        <div class="card-body">
            <div class="table-responsive material-table">
                <div class="d-flex justify-content-between">
                    <h5 class="card-title">Posts</h5>
                    <span class="search-toggle"><i class="material-icons">search</i></span>
                </div>
                <table class="table dt">
                    <thead class="d-none">
                        <tr>
                            <th>ID</th>
                            <th>Posts</th>
                        </tr>
                    </thead>
                    @foreach ($user->posts as $post)
                    <tr>
                        <td class="d-none">{{$post->id}}</td>
                        <td class="d-flex px-0">
                            <span class="d-none">{{$post->created_at}}</span>
                            <div class="d-flex flex-column">
                                <span>
                                    <i class='material-icons' style="font-size: 17px"> visibility </i>
                                    <b style="vertical-align:top; font-size: 12px">{{$post->views}}</b>
                                </span>
                                <span>
                                    <i class='material-icons' style="font-size: 17px"> comment </i>
                                    <b style="vertical-align:top;font-size: 12px">{{$post->comments->count()}}</b>
                                </span>
                            </div>
                            <div class="ml-2">
                                <p class="mb-1 h6">
                                    <a href="{{ route('article', $post->title_slug) }}" target="_blank"
                                        class="text-dark text-decoration-none">
                                        <span class="p-color">{{$post->title}}</span>
                                    </a>
                                    @if ($post->is_approved == 1)
                                    <span class="protip align-self-center" data-pt-title="post approved"
                                        data-pt-scheme="leaf" data-pt-position="right">
                                        <i class="fa fa-check-circle text-success"></i>
                                    </span>
                                    @elseif($post->is_approved == 2)
                                    <span class="protip align-self-center" data-pt-title="post is pending approval"
                                        data-pt-scheme="dark" data-pt-position="right">
                                        <i class="fa fa-question-circle text-warning"></i>
                                    </span>
                                    @else
                                    <span class="protip align-self-center" data-pt-title="post was not approved"
                                        data-pt-scheme="purple" data-pt-position="right">
                                        <i class="fa fa-check-circle text-danger"></i>
                                    </span>
                                    @endif
                                </p>
                                <p class="m-0">
                                    <span>{{ $post->created_at->format('D jS F Y')}}</span>
                                    <a class="ml-1" href="{{ route('preview', $post->title_slug) }}" target="_blank">
                                        <i class="fa fa-external-link"></i></a>
                                </p>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
