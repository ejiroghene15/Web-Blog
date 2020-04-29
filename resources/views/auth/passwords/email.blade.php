@extends('layouts.master')
@section('title', config('app.name') ." | Forgot Password")
@section('body')
<div class="gh-form-container mt-5 pt-3 px-3">
    <fieldset class="card col-12 col-sm-8 col-md-6 col-lg-5 mx-auto px-0 " style="flex:0">
        <legend class="bg-dark ml-3 w-auto p-2 px-4 h5 rounded">{{ __('Reset Password') }} </legend>

        <div class="card-body text-dark">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-success">
                            {{ __('Send Password Reset Link') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </fieldset>
</div>
@endsection
