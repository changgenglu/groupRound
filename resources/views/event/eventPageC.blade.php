<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{ asset('css/eventPage.css')}}">
    <link rel="icon" href="{{ asset('img/logo.png')}}" type="image/gif" sizes="16x16">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ URL::asset('js/bootstrap.bundle.js' )}}"></script>
    <script src="{{ URL::asset('js/jquery-3.6.0.min.js' )}}"></script>
    <script type="text/javascript" src="http://www.google.com/jsapi"></script>
    <script type="text/javascript" language="javascript">google.load("jquery", "1.3.2");</script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
    <title>團團轉 Group Round</title>
</head>

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
    <!-- Border -->
    <div class="border">

    </div>
    <!-- EventDetail -->
    <div class="container py-3">
        <!-- <div>
            <div class="pb-1">
                <span>
                    <span>2021/10/16 星期天</span>
                </span>
            </div>
            <h1 class="text-main pb-2">陽明山健行 十人滿團</h1>
            <div class="d-flex flex-row pb-2">
                <div>
                    <img class="rounded-circle bg-cover img-host"
                        src="https://secure.meetupstatic.com/photos/member/5/1/9/2/thumb_136640882.jpeg" alt="">
                </div>
                <div class="ps-3">
                    <span class="d-block">舉辦人</span>
                    <span class="fw-bold">林啟德</span>
                </div>
            </div>
        </div> -->
        <div class="row">
            <div class="col-8">
                <h1 class="text-main">{{$eventTitle}}</h1>
                <span>{{  $eventDateTime }} 星期{{$weekday}}</span>
            </div>
            <div class="d-flex flex-row col-4 align-items-center ps-5">
                <div>
                    <a href="{{ url('/member/'.$holduser)}}">
                        <img class="rounded-circle bg-cover img-host"
                            src="{{ asset('upload/'.$userImg) }}" alt="">
                    </a>
                </div>
                <div class="ps-3">
                    <span class="d-block">團長</span>
                    <span class="fw-bold">{{$userName}}</span>
                </div>
            </div>
        </div>
    </div>

    </div>
    <!-- Border -->
    <div class="border">

    </div>
    <!-- EventContent -->
    <div class="bg-main">
        <div class="container">
            <div class="row py-4">
                <!-- Left -->
                <div class="col-8">
                    <!-- Photo -->
                    <div class="pb-5">
                        <img class="img-content"
                        src="{{ asset('eventImg/'.$eventImg) }}" alt="">
                    </div>
                    <!-- Content -->
                    <div>
                        <h4>活動內容及說明</h3>
                    </div>
                    <div>
                        <p>{{$eventContent}}</p>
                    </div>

                    <!-- Attendees -->
                    <div class="pt-3">
                        <span class="h4">參加者</span>
                        <div>
                            <ul class="row">                           
                                @foreach ($userJoin as $person)
                                <li class="col-2 me-2 pt-3"> 
                                    <a href="{{ url('/member/'.$person->userId)}}">
                                        <img class="rounded-circle bg-cover img-attendees"
                                        src="{{ asset('/upload/'.$person->user->userImg) }}">
                                    </a>
                                </li>
                                @endforeach
                            </ul>

                        </div>
                    </div>
                    <!-- Message Board -->
                    <div class="pt-4">
                        <div>
                            <h4>留言板</h4>
                        </div>
                        <div class="pt-2">
                            <img class="rounded-circle bg-cover img-host ms-4"
                                src="https://secure.meetupstatic.com/photos/member/5/1/9/2/thumb_136640882.jpeg" alt="">
                            <div class="ms-3 form-floating d-inline-block align-middle">
                                <textarea class="form-control" style="width: 470px;" placeholder="Leave a comment here"
                                    id="floatingTextarea"></textarea>
                                <label for="floatingTextarea">留言</label>
                            </div>
                            <input class="ms-2 btn btn-secondary" id="btn" type="button" onclick="" value="送出" />
                        </div>
                        <div class="pt-3">
                            <div class="pt-3 d-flex flex-row">
                                <img class="rounded-circle bg-cover img-host ms-4"
                                    src="https://secure.meetupstatic.com/photos/member/5/1/9/2/thumb_136640882.jpeg"
                                    alt="">
                                <div>
                                    <div class="ms-3 bg-white p-3 commentW border-card">
                                        <span class="d-block pb-1">林啟德</span>
                                        <span class="fw-light">請問是要在哪裡集合呢?</span>
                                    </div>
                                    <span class="ms-3 ps-3 fw-light fs-6">1天前</span>
                                </div>
                            </div>
                        </div>
                        <div class="pt-3">
                            <div class="pt-3 d-flex flex-row">
                                <img class="rounded-circle bg-cover img-host ms-4"
                                    src="https://secure.meetupstatic.com/photos/member/5/1/9/2/thumb_136640882.jpeg"
                                    alt="">
                                <div>
                                    <div class="ms-3 bg-white p-3 commentW border-card">
                                        <span class="d-block pb-1">林啟德</span>
                                        <span class="fw-light">請問是要在哪裡集合呢?</span>
                                    </div>
                                    <span class="ms-3 ps-3 fw-light fs-6">1天前</span>
                                </div>
                            </div>
                        </div>
                        <div class="pt-3">
                            <div class="pt-3 d-flex flex-row">
                                <img class="rounded-circle bg-cover img-host ms-4"
                                    src="https://secure.meetupstatic.com/photos/member/5/1/9/2/thumb_136640882.jpeg"
                                    alt="">
                                <div>
                                    <div class="ms-3 bg-white p-3 commentW border-card">
                                        <span class="d-block pb-1">林啟德</span>
                                        <span class="fw-light">請問是要在哪裡集合呢?</span>
                                    </div>
                                    <span class="ms-3 ps-3 fw-light fs-6">1天前</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- Right -->
                <div class="col-4">
                    <div class="sticky-right">
                        <div class="bg-white py-4 pe-4 ps-1 border-card">
                            <ul>
                                <li class="d-block"><img
                                        src="https://img.icons8.com/material-outlined/24/000000/time.png" /><span
                                        class="align-middle ps-2 fs-5">時間:{{ $eventDateTime1}}</span></li>
                                <li class="d-block pt-2"><img
                                        src="https://img.icons8.com/material/24/000000/worldwide-location--v1.png" /><span
                                        class="align-middle ps-2 fs-5">地點:{{ $eventLocation}}</span></li>
                                <li class="d-block pt-2"><img
                                        src="https://img.icons8.com/ios-glyphs/24/000000/conference-call.png" /><span
                                        class="align-middle ps-2 fs-5">人數限制:{{ $peopleNumber}}人</span></li>
                                <li class="d-block pt-2"><img
                                        src="https://img.icons8.com/ios-glyphs/24/000000/toilet.png" /><span
                                        class="align-middle ps-2 fs-5">性別限制:
                                    @if ($userGender =='m')
                                        限男性
                                    @elseif($userGender == 'f')
                                        限女性
                                    @else 無限制
                                    @endif
                                    </span></li>

                            </ul>
                        </div>
                        <div class="mt-4 ps-4">
                            {{-- <span class="fs-6 badge rounded-pill btn-main me-2">社交</span>
                            <span class="fs-6 badge rounded-pill btn-main me-2">桌遊</span> --}}

                            <span class="fs-6 badge rounded-pill btn-main me-2">{{$eventTag}}</span>
                            <span class="fs-6 badge rounded-pill btn-main me-2">{{$eventTag2}}</span>


                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- join -->
    <div class="bg-white pt-4 pb-3 sticky-bottom border-top">
        <div class="container">
            <div class="d-flex justify-content-between">
                <div>
                    <span class="h3">{{$eventTitle}}</span>
                    <span class="fw-light fw-6">{{$eventDateTime2}} 星期{{$weekday}}</span>
                </div>
                <div>
                
                    {{-- <span><img src="/resources/img/share.svg" alt=""></span> --}}
                        {{-- 判斷使用者是否收藏活動 --}}
                    @if ($userLike->where('userId', '=',$user)->first()===null)                        
                        <span id='like' class="like align-middle px-3">&#9733;</span>
                    @else
                        <span id='like' class="like cs align-middle px-3">&#9733;</span>
                    @endif

                    {{-- 判斷活動是否已結束 --}}
                    @if (date('Y年m月d日')>$eventDateTime)
                        <form method="get" action="/edit1/{{$id}}" enctype="multipart/form-data" class="d-inline">
                            @csrf
                        <input class="px-3 btn btn-danger " id="btn" type="submit" onclick="" value="評價回饋" />
                        </form>
                    @else
                        {{-- 判斷使用者是否舉舉辦者 --}}
                        @if ($holduser === $user)
                            <form method="get" action="/edit1/{{$id}}" enctype="multipart/form-data" class="d-inline">
                                @csrf
                            <input class="px-3 btn btn-danger " id="btn" type="submit" onclick="" value="編輯活動" />
                            </form>
                        {{-- 判斷使用者是否加入會員 --}}
                        @elseif ($userJoin->where('userId', '=',$user)->first()===null)  
                            <form method="post" action="/event/join/{{$id}}" enctype="multipart/form-data" class="d-inline">
                                @csrf
                            <input class="px-3 btn btn-orange " id="btn" type="submit" onclick="" value="參加活動" />
                            </form>
                        @else
                            <form method="post" action="/event/cancel/{{$id}}" enctype="multipart/form-data" class="d-inline">
                                @csrf
                            <input class="px-3 btn btn-danger " id="btn" type="submit" onclick="" value="取消活動" />
                            </form>
                        @endif
                    @endif




                </div>
            </div>

        </div>

    </div>

    <!-- Footer -->
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
    <script>


        $(function () {        
            $("#like").click(function () {  //收藏按鈕
            $.ajax({          //ajax傳送到後端
            type: "POST",
            url: "/event/like/{{$id}}",
            data: {'_token':'{{csrf_token()}}'},
            success: function(test){
             console.log(test);
             $("#like").toggleClass('cs');
             }
             });
            })
        })

    </script>

</html>
