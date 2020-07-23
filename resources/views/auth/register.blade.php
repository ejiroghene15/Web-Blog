@extends('layouts.master')
@section('title', config('app.name') ." | Register")

@section('body')

<div class="gh-form-container px-3">
    <fieldset class="card col-12 col-sm-8 col-md-6 col-lg-5  mx-auto px-0">
        <legend class="bg-dark ml-3 w-auto p-2 px-4 h5 rounded">Create an account</legend>
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
        <form action="{{ route('register') }}" method="post">
            @csrf
            <div class="card-body text-dark">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name')  }}" required
                        autocomplete="off">
                    @error('name')
                    <div class="invalid-feedback d-block">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" value="{{ old('username')  }}" required
                        autocomplete="off">
                    @error('username')
                    <div class="invalid-feedback d-block">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Email address</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email')  }}" required>
                    @error('email')
                    <div class="invalid-feedback d-block">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required>
                    @error('password')
                    <div class="invalid-feedback d-block">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Confirm password</label>
                    <input type="password" name="password_confirmation" class="form-control" required>
                </div>
                <input type="submit" value="Register" class="btn btn-success">
            </div>
        </form>
    </fieldset>
    <div class="text-center mt-3 mb-5">
        <a href="/login" class="btn gc-p rounded-pill addinfo">Login to your account</a>
    </div>
</div>
@endsection
