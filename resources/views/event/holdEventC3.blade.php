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

        <!-- Oreder -->
        <div class="position-relative m-4">
            <div class="progress" style="height: 1px;">
                <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0"
                    aria-valuemax="100"></div>
            </div>
            <button type="button"
                class="position-absolute top-0 start-0 translate-middle btn btn-sm btn-main rounded-pill"
                style="width: 2rem; height:2rem;">1</button>
            <button type="button"
                class="position-absolute top-0 start-50 translate-middle btn btn-sm btn-main rounded-pill"
                style="width: 2rem; height:2rem;">2</button>
            <button type="button"
                class="position-absolute top-0 start-100 translate-middle btn btn-sm btn-main rounded-pill"
                style="width: 2rem; height:2rem;">3</button>
        </div>
        <!-- Information -->
        <form method="post" 
        @if (isset($id))  
            action="/edit/store3/{{$id}}"
        @else          
            action="/holdevent/store3" 
        @endif
        class="form-horizontal">
            @csrf
            <div class="row py-4">
                {{-- Left --}}
                <div class="col-6">
                    <div>
                        <label for="time" class="form-label pb-2 h4 d-block">活動時間：</label>
                        {{-- 編輯活動使用if判斷，並顯示原始的活動時間 --}}
                        <input class="eventTime" type="datetime-local" id="time"
                            name="time" 
                            @if (isset($eventDateTime))
                            value="{{$eventDateTime}}"
                            @else
                            value="2021-11-16T22:30"
                            @endif
                            min="2021-11-16T00:00" max="2022-11-16T00:00">
                    </div>
                    <div class="mt-4 pt-3">
                        <label for="title" class="form-label pb-2 h4">舉辦城市：</label>
                        <select class="form-select" name="city" aria-label="userCity">
                            <option selected>選擇地區...</option>
                            <option value="1">基隆市</option>
                            <option value="2">台北市</option>
                            <option value="3">新北市</option>
                            <option value="4">桃園市</option>
                            <option value="5">新竹縣</option>
                            <option value="6">新竹市</option>
                            <option value="7">苗栗縣</option>
                            <option value="8" @isset($eventCity) selected @endisset>台中市</option>
                            <option value="9">彰化縣</option>
                            <option value="10">南投縣</option>
                            <option value="11">雲林縣</option>
                            <option value="12">嘉義縣</option>
                            <option value="13">嘉義市</option>
                            <option value="14">台南市</option>
                            <option value="15">高雄市</option>
                            <option value="16">屏東縣</option>
                            <option value="17">宜蘭縣</option>
                            <option value="18">花蓮縣</option>
                            <option value="19">台東縣</option>
                            <option value="20">澎湖縣</option>
                            <option value="21">金門縣</option>
                            <option value="22">連江縣</option>
                            <option value="23">其他</option>
                        </select>
                    </div>
                    <div class="mt-4 pt-3">
                        <label for="title" class="form-label pb-2 h4 d-block">性別限制：</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" value="m" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">限男生</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" value="f" id="flexRadioDefault2" >
                            <label class="form-check-label" for="flexRadioDefault2">限女生</label>
                        </div> 
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" value="n" id="flexRadioDefault3" @isset($userGender) checked @endisset>
                            <label class="form-check-label" for="flexRadioDefault3">不限制</label>
                        </div>                    
                    </div>

                </div>
                {{-- Right --}}
                <div class="col-6">
                    <div>
                        <label for="title" class="form-label pb-2 h4">活動地點：</label>
                        <input class="form-control bg-main" type="text" name="location" id="location" @isset($eventLocation) value="{{$eventLocation}}"@endisset>
                    </div>
                    <div class="mt-4 pt-3">
                        <label for="title" class="form-label pb-2 h4">人數限制：</label>
                        <input class="form-control bg-main" type="text" name="people" id="people" @isset($peopleNumber) value="{{$peopleNumber}}"@endisset>
                    </div>
                </div>
            </div>
    
            <!-- Button -->
            <div class="d-flex justify-content-between mb-2 py-4">
                <a href="{{ url('/back')}}" class="px-3 btn btn-secondary">上一步</a>
                <input class="px-3 btn btn-main" id="btn" type="submit" onclick="" value="下一步" />
            </div>
        </form>

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