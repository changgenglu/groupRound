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

    <div class="container">

        <!-- Order -->
        <div class="position-relative m-4">
            <div class="progress" style="height: 1px;">
                <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0"
                    aria-valuemax="100"></div>
            </div>
            <button type="button"
                class="position-absolute top-0 start-0 translate-middle btn btn-sm btn-main rounded-pill"
                style="width: 2rem; height:2rem;">1</button>
            <button type="button"
                class="position-absolute top-0 start-50 translate-middle btn btn-sm btn-main rounded-pill"
                style="width: 2rem; height:2rem;">2</button>
            <button type="button"
                class="position-absolute top-0 start-100 translate-middle btn btn-sm btn-secondary rounded-pill"
                style="width: 2rem; height:2rem;">3</button>
        </div>

        <!-- Information -->
        <form method="post" 
        @if (isset($id))  
            action="/edit/store2/{{$id}}"
        @else          
            action="/holdevent/store2" 
        @endif
        enctype="multipart/form-data" class="form-horizontal">
            @csrf
        <div class="row py-4">
                <!-- Left -->
                <div class="col-6">
                    <div>
                        <label for="title" class="form-label h4">活動名稱：</label>
                        {{-- 編輯活動使用isset判斷，並顯示原始的活動標題 --}}
                        <input class="form-control bg-main" type="text" name="title" id="title" size="50" 
                        @isset($eventTitle) value="{{$eventTitle}}"@endisset>
                    </div>
    
                    <div class="mt-3">
                        <label for="content" class="form-label h4">活動內容與說明：</label>
                        {{-- 編輯活動使用isset判斷，並顯示原始的活動內容 --}}
                        <textarea class="form-control bg-main" name="content" id="content" rows="15">@isset($eventContent){{$eventContent}}@endisset</textarea>
                    </div>
    
                </div>
                <!-- Right -->
                <div class="col-6">
                    <div>
                        <label for="file" class="form-label h4">上傳圖片：</label>
                        <input class="form-control" onchange="readURL(this)"
                        type="file" name="img" id="img"
                        targetID="demoImg" accept="image/gif, image/jpeg, image/png"/>
                    </div>
                    {{-- 編輯活動使用if判斷，並顯示原始的活動照片 --}}
                    <div class="img-frame">
                        <img class="img-content mt-4" id="demoImg"
                        @if(isset($eventImg))
                        src="{{ asset('eventImg/'.$eventImg) }}"
                        @else
                        src="https://via.placeholder.com/300x400/FFFFFF?text=預覽圖片"
                        @endif
                        alt="">
                    </div>
                </div>
            </div>
            
            <!-- Button -->
            <div class="d-flex justify-content-between mb-2">
                <a href="{{ url('/back')}}" class="px-3 btn btn-secondary">上一步</a>
                <input class="px-3 btn btn-main" id="btn" type="submit" onclick="" value="下一步" />
            </div>
        </div>
    </form>

    <!-- Footer -->
    <footer class="bg-dark text-center text-lg-start">
        <div class="container ">
            <!-- Copyright -->
            <div class="text-center p-4 text-light">
                <span>© 2021 Copyright GroupRound團團轉共遊平台製作小組</span>
            </div>
        </div>
    </footer>
    <script>

    function readURL(input){   //圖片預覽
     if(input.files && input.files[0]){
        var imageTagID = input.getAttribute("targetID");
        var reader = new FileReader();
        reader.onload = function (e) {
            var img = document.getElementById(imageTagID);
            img.setAttribute("src", e.target.result)
        }
        reader.readAsDataURL(input.files[0]);
     }
    }
    </script>

</html>