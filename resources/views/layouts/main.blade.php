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
    {{-- <link rel="stylesheet" href="{{URL::asset('css/member_interest.css')}}"> --}}

    <style>
        /* 半透明遮罩 */
        /* 新增興趣時顯示 */
        #intCover{            
            display: none;
            position: fixed;
            z-index: 11;
            width:100vw;
            height:100%;            
            background: #2a706c;
            opacity: 0;
            filter:Alpha(Opacity=50, Style=0)
        }
        /* 刪除會員資料時顯示 */
        #bigCover{            
            display: none;
            position: fixed;
            z-index: 11;
            width:100vw;
            height:100%;            
            background: #000000;
            opacity: 0.5;
            filter:Alpha(Opacity=50, Style=0)
        }
        
        /* 彈出視窗 */
        /* 新增興趣時顯示 */
        .popDiv {
            display: none;
            background-color: #f6f7f8;           
            z-index: 11;
            width: 780px;
            height: 250px;
            position: fixed;
            top: 0;
            right: 0;
            left: 0;
            bottom: 0;
            margin: auto;            
            border-radius: 10px;
            box-shadow: rgb(187, 187, 187) 3px 3px 3px 3px;
            padding: 10px;
        }
        /* 刪除會員資料時顯示 */
        #wornningPop{
            width: 250px;
            height: 130px;
        }

        /* 彈出視窗的送出按鈕 */
        /* 新增興趣時顯示 */
        .popDiv .sendPick {
            position: absolute;
            right: 15px;
            bottom: 15px;
        }
        .popDiv .close{
            text-align: right;
        }
        
        /* 刪除會員資料時顯示 */
        #deleteCheck button{
            margin: -20px 10px 0 10px;
        }

        /* 會員興趣泡泡 */
        #userInterest{
            background-color:#41B2AC;
            border-radius: 10px;
            color: white;   
            width: 110px;
            text-align: center;
            line-height:50px;
            margin: 5px;
            border: 0px;
        }

        /* 修改興趣按鈕 */
        #addInterest{
            background-color:#41B2AC;
            border-radius: 10px;
            color: white;   
            width: 50px;
            text-align: center;
            line-height:50px;
            margin: 5px;
            font-size: 2rem;
            padding: AUTO;
            border: 0px;
        }

        /* 彈出視窗會員泡泡的袋子 */
        #pickDiv{
            margin: 0 10px;
            
        }
        
        /* 自訂checkbox按鈕 */
        #pickDiv label {
            padding: 0;
            margin-right: 3px;
            cursor: pointer;
            width: 120px;
        }
        input[type=checkbox] {
            display: none;
        }
        input[type=checkbox]+span {
            display: inline-block;
            background-color:#41B2AC;
            /* background-color:#b0e0de; */
            border-radius: 10px;
            color: white;   
            width: 110px;
            text-align: center;
            line-height:50px;
            margin: 5px;
            border: 0px;

            /* 防止文字被滑鼠選取反白 */
            user-select: none; 
        }
        input[type=checkbox]:checked+span {            
            background-color:#2a706c;
            border-radius: 10px;
            color: white;   
            width: 110px;
            text-align: center;
            line-height:50px;
            margin: 5px;
        }

        /* *{outline: 1px solid #000;} */

        /* 快閃訊息 */
        #notice{
            background-color: #ff8801c0;
            /* width: 80%; */
            text-align: center;
            /* border-radius: 10px; */
            line-height:40px;
            color: white;
            margin-top: -30px;
        }

        /* 刪除會員資料 */
        .userDelete{
            text-align: center;
            margin-bottom: 60px;
            line-height: 40px;

        }
        
    </style>

</head>
<body>
    <div id="bigCover">
    </div>
    <div id="intCover">
    </div>
    
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
    @if (session()->has('notice'))
       <div id="notice">
           {{ session()->get('notice') }}
       </div>
    @endif
    
    @yield('content')
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