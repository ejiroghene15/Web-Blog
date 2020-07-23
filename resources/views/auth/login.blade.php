@extends('layouts.master')
@section('title', config('app.name') ." | Login")

@section('body')
<div class="gh-form-container mt-5 pt-3 px-3">
    <fieldset class="card col-12 col-sm-8 col-md-6 col-lg-5 mx-auto px-0 " style="flex:0">
        <legend class="bg-dark ml-3 w-auto p-2 px-4 h5 rounded">Login to your account</legend>
        @if (session('message'))
        <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span class="fa fa-times-circle"></span>
            </button>
            <span class="mr-2">
                {{ session('message') }}
            </span>
        </div>
        @endif
        <form action="{{route('login')}}" method="post">
            @csrf
            <div class="card-body text-dark">
                <div class="form-group">
                    <label> Email address</label>
                    <input type="text" name="email" class="form-control" required autocomplete="off">
                    @error('email')
                    <div class="invalid-feedback d-block">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <input type="submit" value="Login" name="login" class="btn btn-success px-4">
                <a href="{{ url('password/reset')}}"
                    class="float-right font-weight-bold text-decoration-none text-dark">
                    I forgot my password
                </a>
            </div>
        </form>
    </fieldset>
    <div class="text-center mt-3">
        <a href="/register" class="btn rounded-pill gc-p addinfo">Create an account</a>
    </div>
</div>
@endsection
