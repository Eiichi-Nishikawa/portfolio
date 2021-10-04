@extends('layouts.layout')

@section('content')
<div id="contents" class="site-width">
    <section id="main">
        <div class="form-container">



            <form method="POST" action="{{ route('password.update') }}" class="form">
                <h2 class="title">{{ __('Reset Password') }}</h2>
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <label for="email">{{ __('E-Mail Address') }}</label>

                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                <label for="password">{{ __('Password') }}</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                <label for="password-confirm">{{ __('Confirm Password') }}</label>

                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

                <div class="btn-container">
              <input type="submit" class="btn btn-mid" value="再発行する">
            </div>

            </form>
        </div>
    </section>
</div>
@endsection