@extends('layouts.master')
@section('title', "GistHub | Login")

@section('body')
<div class="gh-form-container mt-5 pt-3 px-3">
    <div class="card col-12 col-sm-8 col-md-6 col-lg-5 mx-auto px-0 " style="flex:0">
        <form action="{{route('login')}}" method="post">
            @csrf
            <div class="card-body text-dark">
                <h5 class="card-title mb-4 text-center text-sm-left">Login to your account</h5>
                <div class="form-group">
                    <label>Username or Email address</label>
                    <input type="text" name="email" class="form-control">
                    @error('email')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <input type="submit" value="Login" name="login" class="btn btn-sm btn-success px-4">
                {{-- <a href="{{ route('reset_password') }}" class="float-right font-weight-bold" style="color:
                #985c0d">
                I forgot my password
                </a> --}}
            </div>
        </form>
    </div>
    <div class="text-center mt-3">
        <a href="/register" class="btn rounded-pill gc-p addinfo">Create an account</a>
    </div>
</div>
@endsection
