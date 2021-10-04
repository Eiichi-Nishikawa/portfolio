<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="{{asset('css/style.css')}}" rel="stylesheet">

    
    </head>
    <body class="page-home page-2colum">
    
        <header>
            <div class="site-width">
                <h1><a href="{{ url('/shirodoras/home') }}">みん城</a></h1>
                    <nav id="top-nav">
                    @guest
                        <ul>
                            <li><a href="{{ route('login') }}">ログイン</a></li>
                        @if (Route::has('register'))
                            <li><a href="{{ route('register') }}">登録</a></li>
                        </ul>
                    </nav>
                        @endif
                    @else
                    <nav id="top-nav">
                        <ul>
                            <li><a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">ログアウト</a></li>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                            <li><a href="{{ route('shirodoras.mypage') }}">{{($user->name)}}</a></li>
                            <li><a href="{{ route('shirodoras.new') }}">新規募集作成</a></li>
                            
                    @endguest       
                        </ul>           
                    </nav>
            </div>
        </header>
        @if (session('flash_message'))
            <div class="msg-slide" role="alert">
                {{ session('flash_message') }}
            </div>
        @endif

        
        @yield('content')
        <footer>
        Copyright みんなで城ドラ. All Rights Reserved.
        </footer>
    </body>
</html>
