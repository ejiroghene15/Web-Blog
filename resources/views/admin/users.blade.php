<div class="tab-pane fade show active" id="users" role="tabpanel" aria-labelledby="users-tab">
    <div class="card text-dark">
        <div class="card-body">
            <div class="table-responsive material-table">
                <div class="d-flex justify-content-between">
                    <h5 class="card-title">Users</h5>
                    <span class="search-toggle"><i class="material-icons">search</i></span>
                </div>
                <table class="table dt">
                    <thead class="d-none">
                        <tr>
                            <th>Name</th>
                        </tr>
                    </thead>
                    @foreach ($users as $user)
                    <tr>
                        <td class="d-flex">
                            <a href="{{route("userprofile", $user->id)}}" class="text-decoration-none text-dark h6">
                                <img src="{{$user->profilepix}}" class="rounded-circle" alt="" height="50" width="50">
                                <div class="ml-2">
                                    <p class="m-0">
                                        {{$user->name}}
                                        @if (filled($user->email_verified_at))
                                        <span class="protip" data-pt-title="Account Verified" data-pt-scheme="leaf"
                                            data-pt-trigger="click" data-pt-animate="bounceIn">
                                            <i class="fa fa-check-circle text-success"></i>
                                        </span>
                                        @endif
                                        <a class=" text-dark text-capitalize d-block text-decoration-none">{{$user->username}}</a>
                                    </p>
                                    @if (($user->lastseen))
                                    <p class="m-0 pt-1">
                                        <span class=" fa fa-eye mr-1"></span>{{$user->lastseen->diffForHumans()}}
                                    </p>
                                    @endif
                                </div>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
