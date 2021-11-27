<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>團員的回饋</title>

    <link rel="stylesheet" href="../css/bootstrap.css">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ URL::asset('js/bootstrap.bundle.js' )}}"></script>
    <script src="{{ URL::asset('js/jquery-3.6.0.min.js' )}}"></script>
    <script type="text/javascript" src="http://www.google.com/jsapi"></script>
    <script type="text/javascript" language="javascript">google.load("jquery", "1.3.2");</script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>

    <link rel="icon" href="../img/logo.png" type="image/gif" sizes="16x16">
    <link rel="stylesheet" href="../css/member.css">
    <link rel="stylesheet" href="../css/member_comment.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <style>
        * {
            /* outline: 1px solid #000; */
        }

       
    </style>
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
    <article>
        <div id="leftDiv">

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

            <section>
                <h2>團員的回饋</h2>
                @foreach ($usercom as $uscom)
                <div id="userComment">

                    <div id="commentTopic" class="row">
                        <div class="col" id="topicText">
                                
                            
                            <p></p> 
                            <!-- 2021/10/26 星期日 -->
                            <h3><b> {{date('Y年m月d日', strtotime($uscom->event["eventDateTime"]))}}</b></h3>
                            <!-- 陽明山健行 -->
                            <br>
                            <p>地點：{{$uscom->event["eventLocation"]}}</p>
                            <!-- 台北陽明山 -->
                            <p >團員：{{$uscom->user["userName"]}}</p>  
                            <!-- 小明、小華、小美 -->
                        </div>
                        <div class="col" id="toppicImg">
                            <img src="{{asset('/img/'.$uscom->event["eventImg"])}}" alt="" style="width: 300px;">
                            <!-- ../img/陽明山.jpg -->
                        </div>
                        
                    </div>
                    
                    <div id="commentContent" class="row">

                        <div class="col-3"id="commentImg">
                            <img src="{{asset('/upload/'.$uscom->user["userImg"])}}" alt="" style="width: 100px;">
                        </div>
                        
                        <div class="col-9 row" >
                            
                            <div class="col-6" id="commentText">
                                <b>{{$uscom->user["userName"]}}</b>對你的活動表示：
                                <!-- 小明 -->
                                <p>{{$uscom->feedback}} </p>
                                <!-- 讚！ -->
                            </div>
                            
                            <div class="col-6" id="commentStar{{$uscom->feedback}}">     
                                                           
                                
                                
                                <script>
                                    
                                    for(var i=0;i< {{$uscom->rate}};i++){
                                        
                                        
                                        var cim=document.createElement("i")
                                        var cim_sAB=cim.setAttribute("class","fa fa-star fa-2x")
                                        var cim_sAB=cim.setAttribute("style","color:rgb(255, 230, 0)")
                                        document.getElementById("commentStar{{$uscom->feedback}}").appendChild(cim)
                                    }


                                </script>

                               
                            </div>
                            
                        </div>
                    </div>
                    
                 
                    
                    <button type="button" class="btn btn-orange btn-sm"><a href="{{ route('member.join') }}" style="color: white">看更多</a></button>
                </div>
                
                @endforeach
                
                

            </section>
        </div>
    </article>
</body>

</html>