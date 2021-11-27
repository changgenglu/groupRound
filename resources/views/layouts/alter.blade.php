<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> @yield('title') </title>
    <link rel="icon" href="{{URL::asset('img/logo.png')}}" type="image/gif" sizes="16x16">


    <link rel="stylesheet" href="{{URL::asset('css/bootstrap.css')}}">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ URL::asset('js/bootstrap.bundle.js' )}}"></script>
    <script src="{{ URL::asset('js/jquery-3.6.0.min.js' )}}"></script>
    <script type="text/javascript" src="http://www.google.com/jsapi"></script>
    <script type="text/javascript" language="javascript">google.load("jquery", "1.3.2");</script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>

    <link rel="stylesheet" href="{{URL::asset('css/member.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/card.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/member_comment.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/member_interest.css')}}">

    <style>
        /* *{outline: 1px solid #000;} */
    </style>

</head>
<body>
    {{-- 頁首 --}}
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
                                <li><a class="dropdown-item" href="{{ route('member.index', $id) }}">我的頁面</a></li>
                                <li><a class="dropdown-item" href="{{ route('member.collect') }}">收藏的活動</a></li>
                                <li><a class="dropdown-item" href="{{ route('member.Alter') }}">修改資料</a></li>
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
    
    <div id="leftDiv">
        {{-- 左選單 --}}
        <div id="userContents">
            <a href="{{ route('member.Alter') }}"><h4>修改基本資料</h4></a>
            <a href="{{ route('member.create') }}"><h4>發起的活動</h4></a>
            <a href="{{ route('member.join') }}"><h4>參加的活動</h4></a>
            <a href="{{ route('member.collect') }}"><h4>收藏的活動</h4></a>
            <a href="{{ route('member.finished') }}"><h4>已結束的活動</h4></a>
            <a href="{{ route('member.comment') }}"><h4>團員回饋</h4></a>

        </div>
    </div>

    <div id="rightDiv">
        @yield('content')        
    </div>


    {{-- 頁尾 --}}
    <footer class="bg-dark text-center text-lg-start navbar-fixed-bottom">
            <div class="container p-4">
                <div class="row">
                    <div class="col-lg-4 col-md-12 mb-4 mb-md-0">
                        <h5 class="text-uppercase text-light fw-bold">關於我們</h5>
                        <p class="text-light">
                            團團團<br>
                        </p>
                    </div>
                    <div class="col-lg-4 col-md-12 mb-4 mb-md-0">
                        <h5 class="text-uppercase text-light fw-bold">聯絡我們</h5>
                        <p class="text-light">
                            電話<br>
                            信箱<br>
                        </p>
                    </div>
                    <div class="col-lg-4 col-md-12 mb-4 mb-md-0">
                        <!-- Icon links -->
                        <div class="container pt-4 text-center text-white">
                            <!-- Section: Social media -->
                            <section class="mb-2">
                                <!-- Facebook -->
                                <a
                                    class="btn btn-link btn-floating btn-lg text-dark m-1"
                                    href="#!"
                                    role="button"
                                    data-mdb-ripple-color="dark"
                                    ><img src="{{ asset('img/icons8-facebook-24.png') }}" type="img/gif" alt="facebook" size="24x24">
                                </a>
                                <!-- Instagram -->
                                <a
                                    class="btn btn-link btn-floating btn-lg text-dark m-1"
                                    href="#!"
                                    role="button"
                                    data-mdb-ripple-color="dark"
                                    ><img src="{{ asset('img/icons8-instagram-24.png') }}" alt="instagram" size="24x24">
                                </a>
                                <!-- Github -->
                                <a
                                    class="btn btn-link btn-floating btn-lg text-dark m-1"
                                    href="#!"
                                    role="button"
                                    data-mdb-ripple-color="dark"
                                    ><img src="{{ asset('img/icons8-github-24.png') }}" alt="github" size="24x24">
                                </a>
                                <!-- mail -->
                                <a
                                    class="btn btn-link btn-floating btn-lg text-dark m-1"
                                    href="#!"
                                    role="button"
                                    data-mdb-ripple-color="dark"
                                    ><img src="{{ asset('img/icons8-mail-24.png') }}" alt="mailUs" size="24x24">
                                </a>
                            </section>
                            <!-- Copyright -->
                            <div class="text-center p-3 text-light">
                                <h6>© 2021 GroupRound團團轉共遊平台製作小組</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

</body>
</html>