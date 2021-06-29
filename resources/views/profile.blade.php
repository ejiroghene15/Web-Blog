@extends('layouts.master')
@section('title', config('app.name') ." | $profile->name")
@section('body')

<div id="profile">
  <div class="col-md-6 col-sm-6 mx-auto mb-5">
    @if (session('message'))
    <div class="alert alert-success" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span class="fa fa-times-circle"></span>
      </button>
      <h6>{{ session('message') }}</h6>
    </div>
    @endif

    <div class="card profile-card border-0">
      <div class="tab-content" id="pills-tabContent">
        <section class="tab-pane fade show active text-center" id="display-profile" role="tabpanel"
          aria-labelledby="pills-home-tab">
          <img src="{{ $profile->profilepix }}" class="rounded-circle profilepix" style="margin-top: -65px">
          <p class="lead text-capitalize mb-0">{{$profile->name}}</p>
          <p class="lead mb-2" style="font-size: 14px">{{$profile->email}}</p>
          <p class="px-3"> {{$profile->bio}} </p>
          <p>
            @if (filled($profile->facebook))
            <a href="{{$profile->facebook}}" class="mr-1" target="_blank"><img src="{{ asset('img/facebook.png') }}"
                alt="" height="25" width="25"></a>
            @endif
            @if (filled($profile->twitter))
            <a href="{{$profile->twitter}}" target="_blank"><img src="{{ asset('img/twitter.png') }}" alt="" height="25"
                width="25"></a>
            @endif
          </p>
          <ul class="nav nav-pills justify-content-center mb-n3" id="pills-tab" role="tablist">
            <li class="nav-item">
              <a class="btn btn-sm btn-info " data-toggle="pill" href="#edit-profile" role="tab"
                aria-controls="pills-profile" aria-selected="false">Edit Profile</a>
            </li>
          </ul>
        </section>

        <section class="tab-pane fade" id="edit-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
          <form method="post" enctype="multipart/form-data" class="card-body">
            @method("PUT")
            @csrf
            <center id="img-container" class="mb-4 position-relative d-flex justify-content-center">
              <span class="fa-stack  position-absolute align-self-center text-dark" style="font-size: 1.8em">
                <i class="fa fa-circle fa-stack-2x"></i>
                <i class="fa fa-camera fa-stack-1x fa-inverse" style="font-size:16px"></i>
              </span>
              <input type="file" name="profilephoto" class="position-absolute align-self-center" style="opacity:0">
              <img src="{{ $profile->profilepix }}" id="profilephoto" class="rounded-circle profilepix">
            </center>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Name</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="name" value="{{$profile->name}}">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Username</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="username" value="{{$profile->username}}">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Email Address</label>
              <div class="col-sm-9">
                <input type="email" class="form-control" name="email" value="{{$profile->email}}">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Bio</label>
              <div class="col-sm-9">
                <textarea name="bio" rows="8" class="form-control">{{$profile->bio}}</textarea>
              </div>
            </div>

            <div class="form-group row" id="social-links">
              <div class="col-sm-3">
                <div class="btn-group">
                  <button type="button" class="btn btn-light gh-btn dropdown-toggle" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    Social Links
                  </button>
                  <div class="dropdown-menu px-3">
                    <a class="dropdown-item px-0" href="#fb">
                      <img src="{{ asset('img/facebook.png') }}" alt="" height="25" width="25">
                      <span class="ml-1" style="font-size: 14px;">Facebook</span>
                    </a>
                    <div class="dropdown-divider mx-n3"></div>
                    <a class="dropdown-item px-0" href="#tw">
                      <img src="{{ asset('img/twitter.png') }}" alt="" height="25" width="25">
                      <span class="ml-1" style="font-size: 14px;">Twitter</span>
                    </a>
                  </div>
                </div>
              </div>

              <div class="col-sm-9">
                <div class="row">
                  <div @unless(filled($profile->facebook)) id="fb" @endunless class="col-sm-6
                    pl-0">
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <button class="btn bg-transparent border-0" type="button">
                          <img src="{{ asset('img/facebook.png') }}" alt="" height="25" width="25">
                        </button>
                      </div>
                      <input type="text" name="fb_link" class="form-control" value="{{$profile->facebook}}">
                    </div>
                  </div>
                  {{-- close facebook textinput --}}
                  <div @unless(filled($profile->twitter)) id="tw" @endunless class="col-sm-6
                    pl-0">
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <button class="btn bg-transparent border-0" type="button">
                          <img src="{{ asset('img/twitter.png') }}" alt="" height="25" width="25">
                        </button>
                      </div>
                      <input type="text" name="tw_link" class="form-control" value="{{$profile->twitter}}">
                    </div>
                  </div>
                  {{-- close twitter textinput --}}
                </div>
              </div>

            </div>

            <center>
              <button type="submit" class="btn btn-success gh-btn" style="font-size: 16px">
                Update Profile
              </button>
            </center>
          </form>
        </section>
      </div>

    </div>
  </div>
</div>
@endsection

@section('footer')
<div class="d-none d-md-block d-lg-block" style="z-index:10">@parent</div>
@endsection

@section('scripts')
@parent
@verbatim
<script>
  $(":file").change(function (){
        const reader = new FileReader();
        reader.onload = function ({target}) {
            $("#profilephoto").attr('src', target.result);
        };
        reader.readAsDataURL(this.files[0]);
});

</script>
@endverbatim
@endsection
