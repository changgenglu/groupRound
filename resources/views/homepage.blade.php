
<?php 
use App\Models\user;

if(session()->has('LoggedUser')){
$user = User::where('userId', session('LoggedUser'))->first()->userId;
$conn = mysqli_connect("remotemysql.com:3306","IzcvVhMfaH","yoHovlKfkZ","IzcvVhMfaH")or die ("Error in conneciton");
$queryuser = mysqli_query($conn,"SELECT city FROM `citylist` INNER JOIN user on `citylist`.cityId = user.cityId WHERE userId = $user " );
$resultuser = mysqli_fetch_array($queryuser);

}

else {
    $resultuser["city"]="台中市";
}

?>

<?php
$keyword=$resultuser["city"];
$select="";
?>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ url('/css/bootstrap.css') }}">
    <link rel="icon" href="../img/logo.png" type="image/gif" sizes="16x16">
    <title>團團轉 Group Round</title>
    <link rel="stylesheet" href="{{ url('/css/ActCss/actSearch.css') }}">
    <link rel="stylesheet" href="{{ url('/css/mainpage.css') }}">
    <link href="{{ url('/css/customForAll.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ URL::asset('js/bootstrap.bundle.js' )}}"></script>
    <script src="{{ URL::asset('js/jquery-3.6.0.min.js' )}}"></script>
    <script type="text/javascript" src="http://www.google.com/jsapi"></script>
    <script type="text/javascript" language="javascript">google.load("jquery", "1.3.2");</script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <style>
        
        /* -----------------快閃訊息------------------------------------ */
        #notice{
            background-color: #ff8801c0;
            text-align: center;
            line-height:40px;
            color: white;}
        
        /* -----------------快閃訊息------------------------------------ */
        
        </style>
</head>

<body>
    
    
    {{-- -----------------快閃訊息------------------------------------  --}}
    {{-- 成功刪除會員資料快閃訊息 --}}
    @if (session()->has('notice'))
    <div id="notice">
        {{ session()->get('notice') }}
    </div>
    @endif
     {{-- -----------------快閃訊息------------------------------------ * --}}

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
    <body style="background-color:  #f6f7f8;">
    {{-- 原bnner --}}
    {{-- <div class="MainPageBanner">
        <img src="../img/mainpagepic1.png" id="MainPagePicture" style="width: 100%;">
    </div> --}}
    {{-- 幻燈片 --}}
    <div id="banner" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#banner" data-slide-to="0" class="active"></li>
                <li data-target="#banner" data-slide-to="1"></li>
                <li data-target="#banner" data-slide-to="2"></li>
                <li data-target="#banner" data-slide-to="3"></li>
            </ol>
            <div class="carousel-inner MainPageBanner">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-item active">
                    <img src="{{ asset('img/banner01.jpg') }}" class="d-block w-100" alt="picture1">
                    <div class="carousel-caption d-none d-md-block">
                        <h1>GROUP ROUND</h1>
                        <p>團團轉共遊平台</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('img/banner02.jpg') }}" class="d-block w-100" alt="picture2">
                    <div class="carousel-caption d-none d-md-block">
                        <h1>GROUP ROUND</h1>
                        <p>團團轉共遊平台</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('img/banner03.jpg') }}" class="d-block w-100" alt="picture3">
                    <div class="carousel-caption d-none d-md-block">
                        <h1>GROUP ROUND</h1>
                        <p>團團轉共遊平台</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('img/banner04.jpg') }}" class="d-block w-100" alt="picture3">
                    <div class="carousel-caption d-none d-md-block">
                        <h1>GROUP ROUND</h1>
                        <p>團團轉共遊平台</p>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#banner" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            </a>
            <a class="carousel-control-next" href="#banner" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
            </a>
    </div>
    
    {{-- 按鈕 --}}
    <div class="MainPageButtonAll">
        <div class="MainPageButton">
            <a href="{{ route('eventcreate') }}">
                <span>我要開團</span>
                <span>我要開團</span>
            </a>
        </div>

        <div class="MainPageButton2">
            <a href="{{ route('eventlist')}}">
                <span>我要加入</span>
                <span>我要加入</span>
            </a>
        </div>
    </div>

    <div class="container">
        <form action="/searchme" method="get">  
        {{ csrf_field() }}
            <div class="ActPageSearch container">
                <div class="ActPageSearchSelect"><img src="../img/selecticon.png" style="width: 1vw;height: 2vh;"></div>
                <select class="form-select" aria-label="" name="select"
                    style="background-color: rgb(240, 240, 240) ;font-weight: 900;text-align: center;width: 10vw;">
                    <option selected value="">活動類型...</option>
                    <option value="藝術與文化">藝術與文化</option>
                    <option value="生態與環境">生態與環境</option>
                    <option value="學習">學習</option>
                    <option value="親子活動">親子活動</option>
                    <option value="寵物">寵物</option>
                    <option value="旅遊與戶外">旅遊與戶外</option>
                    <option value="運動">運動</option>
                    <option value="宗教與心靈">宗教與心靈</option>
                    <option value="科學與教育">科學與教育</option>
                    <option value="社交活動">社交活動</option>
                    <option value="桌遊">桌遊</option>
                    <option value="密室脫逃">密室脫逃</option>
                    <option value="美食與品味">美食與品味</option>
                    <option value="線上">線上</option>
                    <option value="烹飪">烹飪</option>
                    <option value="攝影">攝影</option>
                </select>
                <input type="text"  name="keyword" style="width: 47.5vw;" placeholder='請輸入關鍵字 如:台中、狼人殺、密室脫逃等等'  class="form-control">
                &nbsp;
                <input type="submit" class="btn btn-orange btn-sm" id="searchBtn" name="searchBtn" value="搜尋">
            </div>
        </form> 
        
    </div>

    <?php
    echo
    '<div class="MainPageText">
        <h1>'.$resultuser["city"].'附近的推薦活動</h1>
    </div>'
    ?>
    
    <?php
            $conn = mysqli_connect("remotemysql.com:3306","IzcvVhMfaH","yoHovlKfkZ","IzcvVhMfaH")or die ("Error in conneciton");
            $queryData = mysqli_query($conn,"SELECT * FROM (`event` INNER JOIN citylist on `event`.eventCity = citylist.cityId) 
                                        INNER JOIN taglist on `event`.eventTag = taglist.tagId WHERE (
                                            eventTitle like '%$keyword%' OR eventLocation like '%$keyword%' OR eventContent like '%$keyword%' OR eventCity 
                                            like '%$keyword%' OR eventTag like '%$keyword%'OR city like '%$keyword%' OR tag like '%$keyword%')
                                        AND tag like '%$select%' ORDER BY eventDateTime"); 
            $data_nums = mysqli_num_rows( $queryData );
            $per = 3;
            $pages = ceil($data_nums/$per);
            if (!isset($_GET["page"])){ //假如$_GET["page"]未設置
                $page=1; //則在此設定起始頁數
            } else {
                $page = intval($_GET["page"]); //確認頁數只能夠是數值資料
            }
            $start = ($page-1)*$per; //每一頁開始的資料序號       
            $query = mysqli_query($conn,"SELECT * FROM (`event` INNER JOIN citylist on `event`.eventCity = citylist.cityId) 
                                        INNER JOIN taglist on `event`.eventTag = taglist.tagId WHERE (
                                            eventTitle like '%$keyword%' OR eventLocation like '%$keyword%' OR eventContent like '%$keyword%' OR eventCity 
                                            like '%$keyword%' OR eventTag like '%$keyword%' OR city like '%$keyword%' OR tag like '%$keyword%')
                                        AND tag like '%$select%' ORDER BY eventDateTime LIMIT ".$start. ',' .$per);
            while ($result = mysqli_fetch_array($query)){
                $DateTime = $result['eventDateTime'];
                $eventDateTime = date('Y-m-d H:i', strtotime($DateTime));
              echo 
              "     
                    <a href='/event/".$result['eventId']."' target='_blank'>
                    <div class='card' id='card1'  style='width:24vw;display:inline-flex'>
                     <img src='../eventImg/".$result['eventImg']."' class='card-img-top' style='height: 33vh;'  alt='...'>
                     <div class='card-body'>
                        <h4 class='card-text'>".$result['eventTitle']."</h4>
                     </div>
                     <div class='card-footer name'>
                      <small class='text-muted'>地點:".$result['city'].'&nbsp&nbsp&nbsp'.'時間:'.$eventDateTime."</small>
                      </div>
                     </div>  
                     </a>
             "; }
                
            
              
              ?>
              <?php
              echo
              '<a class="btn btn-outline-secondary" id="MoreButton" role="button" href="searchme?_token=FZdtM6lmFSKhJzlCGbcTTs7IiZqOC0MmTfGKgdnV&select=&keyword='.$keyword.'&searchBtn=搜尋">看更多...</a> ' 
              ?>  
              

    <div class="MainPageText">
        <h1>其他的推薦活動</h1>
    </div>

    <?php
            $conn = mysqli_connect("remotemysql.com:3306","IzcvVhMfaH","yoHovlKfkZ","IzcvVhMfaH")or die ("Error in conneciton");
            $queryData = mysqli_query($conn,"SELECT *,city FROM (`event` INNER JOIN citylist on `event`.eventCity = citylist.cityId) INNER JOIN taglist on `event`.eventTag = taglist.tagId"); 
            $data_nums = mysqli_num_rows($queryData);
            $per = 3;
            $pages = ceil($data_nums/$per);
            if (!isset($_GET["page"])){ //假如$_GET["page"]未設置
                $page=1; //則在此設定起始頁數
            } else {
                $page = intval($_GET["page"]); //確認頁數只能夠是數值資料
            }
            $start = ($page-1)*$per; //每一頁開始的資料序號       
            $query = mysqli_query($conn,"SELECT *,city FROM (`event` INNER JOIN citylist on `event`.eventCity = citylist.cityId) INNER JOIN taglist on `event`.eventTag = taglist.tagId LIMIT " .$start. ',' .$per); 
            
                 
            while ($result = mysqli_fetch_array($query)){
                $DateTime = $result['eventDateTime'];
                $eventDateTime = date('Y-m-d H:i', strtotime($DateTime));
              echo 
              
              "      
                    <a href='/event/".$result['eventId']."' target='_blank'>
                     <div class='card' id='card1'  style='width:24vw;display:inline-flex'>
                     <img src='../eventImg/".$result['eventImg']."' class='card-img-top' style='height: 33vh;' alt='...'>
                     <div class='card-body'>
                        <h4 class='card-text'>".$result['eventTitle']."</h4>
                     </div>
                     <div class='card-footer name'>
                      <small class='text-muted'>地點:".$result['city'].'&nbsp&nbsp&nbsp'.'時間:'.$eventDateTime."</small>
                      </div>
                     </div>  
                     </a>
             "; }
              ?>
              <a class="btn btn-outline-secondary" id="MoreButton" href="{{ route('eventlist')}}" role="button">看更多...</a>
               <br><br><br> <br><br><br>

                        

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
