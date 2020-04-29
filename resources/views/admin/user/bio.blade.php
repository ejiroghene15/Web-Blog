<div class="tab-pane fade show active" id="prf" role="tabpanel" aria-labelledby="profile-tab">
    <div class="card text-dark">
        <div class="card-body">
            <div class="d-flex">
                <section id="image" class="mr-3">
                    <img src="{{$user->profilepix}}" height="100" width="100" class="rounded-circle" alt="">
                </section>
                <section id="bio" class=" align-self-start mt-3">
                    <p class="text-capitalize h6">{{$user->name}}</p>
                    <p class="m-0">
                        @if (filled($user->facebook))
                        <a href="{{$user->facebook}}"><img src="{{ asset('img/facebook.png') }}" alt="" height="25"
                                width="25"></a>
                        @endif
                        @if (filled($user->twitter))
                        <a href="{{$user->twitter}}"><img src="{{ asset('img/twitter.png') }}" alt="" height="25"
                                width="25"></a>
                        @endif
                    </p>
                    <p class="m-0 py-1">
                        <span>
                            <img src="{{ asset('images/mail.png')}}" class="mr-1" alt="" height="25" width="25">
                        </span>
                        <span>{{$user->email}}</span>
                    </p>
                    @if (filled($user->bio))
                    <p class="m-0">{{$user->bio}}</p>
                    @else
                    <h6 class="mt-1 h6 text-info">Bio has not been filled yet.</h6>
                    @endif
                </section>
            </div>
        </div>
    </div>
</div>
