@extends('layouts.master')
@section('title', "GistHub | Register")

@section('body')

<div class="gh-form-container px-3">
    <div class="card col-12 col-sm-8 col-md-6 col-lg-5  mx-auto px-0">
        <div class="card-body text-dark">
            <h5 class="card-title mb-4 text-center text-sm-left">Create an account</h5>
            <form action="{{ route('register') }}" method="post">
                @csrf
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control">
                    @error('name')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control">
                    @error('username')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Email address</label>
                    <input type="email" name="email" class="form-control">
                    @error('email')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control">
                    @error('password')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Confirm password</label>
                    <input type="password" name="password_confirmation" class="form-control">
                </div>
                <input type="submit" value="Register" class="btn btn-sm btn-success">
            </form>
        </div>
    </div>
    <div class="text-center mt-3 mb-5">
        <a href="/login" class="btn gc-p rounded-pill addinfo">Login to your account</a>
    </div>
</div>
@endsection
