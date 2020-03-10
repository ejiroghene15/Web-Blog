@extends('layouts.master')
@section('title', "Gisthub | $profile->name")
@section('body')

<div id="profile">
    <div class="col-lg-6 col-md-8 col-sm-8 mx-auto">
        <div class="card text-dark">
            <div class="card-body">
                <center id="img-container" class="mb-4 position-relative d-flex justify-content-center">
                    <span class="fa-stack  position-absolute align-self-center" style="font-size: 1.8em">
                        <i class="fa fa-circle fa-stack-2x"></i>
                        <i class="fa fa-camera fa-stack-1x fa-inverse" style="font-size:16px"></i>
                    </span>
                    <img src="/images/body.jpg" height="120" width="120" class="rounded-circle">
                </center>
                <p class="lead text-capitalize">{{$profile->name}}</p>
                <form method="post">
                    @method("PUT")
                    @csrf
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
                                <button type="button" class="btn btn-light gh-btn dropdown-toggle"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                                <div @unless(!empty($profile->facebook)) id="fb" @endunless class="col-sm-6 pl-0">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <button class="btn bg-transparent border-0" type="button">
                                                <img src="{{ asset('img/facebook.png') }}" alt="" height="25"
                                                    width="25">
                                            </button>
                                        </div>
                                        <input type="text" name="fb_link" class="form-control"
                                            value="{{$profile->facebook}}">
                                    </div>
                                </div>
                                {{-- close facebook textinput --}}
                                <div @unless(!empty($profile->twitter)) id="tw" @endunless class="col-sm-6 pl-0">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <button class="btn bg-transparent border-0" type="button">
                                                <img src="{{ asset('img/twitter.png') }}" alt="" height="25" width="25">
                                            </button>
                                        </div>
                                        <input type="text" name="tw_link" class="form-control"
                                            value="{{$profile->twitter}}">
                                    </div>
                                </div>
                                {{-- close twitter textinput --}}
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success gh-btn">Update Profile</button>
                </form>
            </div>
        </div>
    </div>

    @endsection

    @section('scripts')
    @parent
    @endsection
