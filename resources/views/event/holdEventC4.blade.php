<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{ asset('css/holdEvent.css')}}">
    <link rel="icon" href="{{ asset('img/logo.png')}}" type="image/gif" sizes="16x16">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ URL::asset('js/bootstrap.bundle.js' )}}"></script>
    <script src="{{ URL::asset('js/jquery-3.6.0.min.js' )}}"></script>
    <script type="text/javascript" src="http://www.google.com/jsapi"></script>
    <script type="text/javascript" language="javascript">google.load("jquery", "1.3.2");</script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
    <title>團團轉 Group Round</title>
</head>
<?php
use App\Models\User;

$user = 0; 
if(session()->has('LoggedUser')){
    $user = User::where('userId', session('LoggedUser'))->first()->userId;
}

?>
<body>
    <!-- 頁首 -->
    <header>
       <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm rounded">
            <div class="container-fluid">
                <!-- home -->
                <button type="button" class="btn">
                    <a class="navbar-brand" href="{{ route('home')}}">
                        <img src="{{ asset('img/logo-text-1.png') }}" type="image/gif" width="120px">
                    </a>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <!-- 活動建立頁面 -->
                        <li class="nav-item">
                            <button type="button" class="btn btn-orange btn-sm"><a href="{{ route('eventcreate') }}" {{--活動route--}}
                                    class="link-light">辦活動</a></button>
                        </li>
                    </ul>

                    <form class="d-flex">
                        <!-- 搜尋 -->
                        <input class="form-control me-2 bg-light" type="search" placeholder="搜尋..." aria-label="Search">
                        <a href="{{ route('eventlist')}}"><button class="btn btn-secondary btn-sm" type="submit">
                            <img src="{{ asset('img/search.svg') }}" type="image/gif" size="16x16"></button>
                        </a>
                    </form>
                    
                    <!-- Authentication Links -->
                    <div class="nav-link link-dark">
                        @if(!session()->has('LoggedUser'))
                            <span class="nav-item">
                                <a class="nav-link link-dark" href="{{ route('login') }}">
                                    <img src="{{ asset('img/log-in.svg') }}" type="image/gif" size="16x16">{{ __(' 登入/註冊') }}
                                </a>
                            </span>
                        @else
                        
                        <div class="nav-item dropdown">
                            <a type="button" id="navbarDropdown" class="nav-link link-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="{{ asset('img/user.svg') }}" type="image/gif" size="16x16">
                                {{ __('會員中心') }}
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('member.index', $user) }}">我的頁面</a></li>
                                <li><a class="dropdown-item" href="{{ route('member.collect', $user) }}">收藏的活動</a></li>
                                <li><a class="dropdown-item" href="{{ route('member.Alter', $user) }}">修改資料</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="{{ route('logout') }}">
                                    {{ __('登出') }}
                                </a></li>
                            </ul>
                        </div>
                        @endif
                        
                    </div>
                </div>
            </div>
            </div>
        </nav>
    </header>

    <div class="container pt-5">
        <div class="d-flex justify-content-center align-items-center flex-row py-5 my-5">
            <div class="justify-content-center">
                @if (isset($id))
                    <h1 class="d-flex justify-content-center">更新成功！</h1>
                    <h4 class="d-flex justify-content-center">已更新活動，按下確定查看吧！</h3>
                @else                    
                    <h1 class="d-flex justify-content-center">建立成功！</h1>
                    <h4 class="d-flex justify-content-center">已建立新活動，按下確定查看吧！</h3>
                @endif
            </div>


        </div>

        <!-- Button -->
        <div class="d-flex justify-content-center mb-2 py-4">
            <form method="get"
            @if (isset($id))  
            action="/event/{{$id}}"
            @else          
            action="event/{{$last = DB::table('event') -> orderByDesc('eventId') -> first() ->eventId;}}" 
            @endif
            class="form-horizontal">
                @csrf
                <input class="px-3 btn btn-main" id="btn" type="submit" onclick="" value="確定" />
            </form>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-center text-lg-start fixed-bottom">
        <div class="container ">
            <!-- Copyright -->
            <div class="text-center p-4 text-light">
                <span>© 2021 Copyright GroupRound團團轉共遊平台製作小組</span>
            </div>
        </div>
    </footer>

</html>