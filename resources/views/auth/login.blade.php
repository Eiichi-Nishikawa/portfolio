@extends('layouts.layout')

@section('content')

    <!-- メインコンテンツ -->
    <div id="contents" class="site-width">
        
      <!-- Main -->
      <section id="main" >

       <div class="form-container">
        
         <form action="{{ route('login') }}" method="post" class="form">
           @csrf

           <h2 class="title">{{ __('Login') }}</h2>
           
           <label for="email">
           {{ ('E-Mailアドレス') }}
           </label>
             <input id="email" type="email" class="err @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

             @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
           
           <label for="password">
           {{ ('パスワード') }}
           </label>
             <input id="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror" required autocomplete="current-password">
             @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
             @enderror

          
                
            <div class="btn-container">
              <button type="submit" class="btn btn-mid">
              {{ ('ログイン') }}
              </button>
              @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
            </div>
         </form>
       </div>

      </section>

    </div>
@endsection
