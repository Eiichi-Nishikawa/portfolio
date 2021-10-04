@extends('layouts.layout')

@section('content')
<div id="contents" class="site-width">
    <section id="main">
        <div class="form-container">




            <form method="POST" action="{{ route('password.email') }}" class="form">
                <h2 class="title">{{ __('Reset Password') }}</h2>
                @csrf
                <label for="email">{{ __('E-Mail Address') }}</label>

                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif


                <div class="btn-container">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Send Password Reset Link') }}
                    </button>
                </div>
            </form>

        </div>
    </section>
</div>
@endsection