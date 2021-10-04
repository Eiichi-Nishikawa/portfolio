@extends('layouts.layout')

@section('content')
<body class="page-signup page-1colum">
    <div id="contents" class="site-width">
        <section id="main" >
            <div class="form-container">
                <form method="POST" action="{{ route('register') }}" class="form">
                    <h2 class="title">ユーザー登録</h2>
                        @csrf
                            <label for="name">{{ ('お名前') }}</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                           
                            <label for="email">{{ ('Emailアドレス') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                            <label for="password">{{ ('パスワード') }} <span>{{ ('※８文字以上') }}</span></label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ ('再確認パスワード') }}</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                
                                <div class="btn-container">
                                    <button type="submit" class="btn btn-mid">
                                    {{ ('登録する') }}
                                    </button>
                                </div>         
                </form>
            </div>
        </div>
       
@endsection

