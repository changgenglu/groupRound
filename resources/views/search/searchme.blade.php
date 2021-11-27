
<?php 
//獲取搜索關鍵字
if (isset($_GET["keyword"])){
    $keyword=$_GET["keyword"];
    $select=$_GET["select"];
}
else{
    header('Location:/eventlist');
    exit();
}
    


 ?>
 

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="icon" href="../img/logo.png" type="image/gif" sizes="16x16">
    <title>團團轉 Group Round</title>
    <link rel="stylesheet" href="../css/ActCss/actSearch.css">
    <link rel="stylesheet" href="/css/mainpage.css">
    <link href="/css/customForAll.css" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ URL::asset('js/bootstrap.bundle.js' )}}"></script>
    <script src="{{ URL::asset('js/jquery-3.6.0.min.js' )}}"></script>
    <script type="text/javascript" src="http://www.google.com/jsapi"></script>
    <script type="text/javascript" language="javascript">google.load("jquery", "1.3.2");</script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
    <style>

    </style>
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
            <input type="text"  name="keyword" style="width: 47.5vw;" placeholder='請輸入關鍵字'  class="form-control"></input>&nbsp
            <input type="submit" class="btn btn-orange btn-sm" id="searchBtn" name="searchBtn" value="搜尋"></input>
        </form>    
        </div>
            <br>
            <div id="result"></div>

    </div>


        </div>
      
            <div class="container" style="display: flex;justify-content: center ;align-items: center;">

            <a href="/searchme?_token=FZdtM6lmFSKhJzlCGbcTTs7IiZqOC0MmTfGKgdnV&select=&keyword=台中&searchBtn=搜尋">   
          <div class="box"><span class="btn ActTags rounded-pill fw-bolder me-5" id="TagBtn1" name="TagBtn">台中</span></div>
          </a>
          
          <a href="/searchme?_token=FZdtM6lmFSKhJzlCGbcTTs7IiZqOC0MmTfGKgdnV&select=&keyword=台南&searchBtn=搜尋">   
          <div class="box"><span class="btn ActTags rounded-pill fw-bolder me-5" id="TagBtn2" name="TagBtn">台南</span></div>
          </a>
          
          <a href="/searchme?_token=FZdtM6lmFSKhJzlCGbcTTs7IiZqOC0MmTfGKgdnV&select=&keyword=台北&searchBtn=搜尋">   
          <div class="box"><span class="btn ActTags rounded-pill fw-bolder me-5" id="TagBtn3" name="TagBtn">台北</span></div>
          </a>
          
          <a href="/searchme?_token=FZdtM6lmFSKhJzlCGbcTTs7IiZqOC0MmTfGKgdnV&select=&keyword=狼人殺&searchBtn=搜尋">   
          <div class="box"><span class="btn ActTags rounded-pill fw-bolder me-5" id="TagBtn4" name="TagBtn">狼人殺</span></div>
          </a>

          <a href="searchme?_token=FZdtM6lmFSKhJzlCGbcTTs7IiZqOC0MmTfGKgdnV&select=&keyword=新北&searchBtn=搜尋">   
          <div class="box"><span class="btn ActTags rounded-pill fw-bolder me-5" id="TagBtn5" name="TagBtn">新北</span></div>
          </a>
          
          <a href="searchme?_token=FZdtM6lmFSKhJzlCGbcTTs7IiZqOC0MmTfGKgdnV&select=&keyword=密室脫逃&searchBtn=搜尋">   
          <div class="box"><span class="btn ActTags rounded-pill fw-bolder me-5" id="TagBtn6" name="TagBtn">密室脫逃</span></div>
          </a>

          <a href="searchme?_token=FZdtM6lmFSKhJzlCGbcTTs7IiZqOC0MmTfGKgdnV&select=&keyword=運動&searchBtn=搜尋">   
          <div class="box"><span class="btn ActTags rounded-pill fw-bolder me-5" id="TagBtn7" name="TagBtn">運動</span></div>
          </a>
          
          <a href="searchme?_token=FZdtM6lmFSKhJzlCGbcTTs7IiZqOC0MmTfGKgdnV&select=&keyword=高雄&searchBtn=搜尋">   
          <div class="box"><span class="btn ActTags rounded-pill fw-bolder me-5" id="TagBtn8" name="TagBtn">高雄</span></div>
          </a>

      </div>
          
           
    
   
        </div>
        <br><br>
        <?php  
             if ($keyword == null && $select == "" )
             echo "<div><h1 style='color: #068a83;font-weight:bolder;'>所有活動</h1></div>";
             else if ($keyword == $select)
            echo"<div><h1>關於 <span style='color: #068a83;font-weight:bolder;'> $keyword </span> 的搜尋結果...</h1></div>";
            else
             echo"<div><h1>關於 <span style='color: #068a83;font-weight:bolder;'> $keyword $select </span> 的搜尋結果...</h1></div>" ?>
    </div>

    <?php
            $conn = mysqli_connect("remotemysql.com:3306","IzcvVhMfaH","yoHovlKfkZ","IzcvVhMfaH")or die ("Error in conneciton");
            $queryData = mysqli_query($conn,"SELECT * FROM (`event` INNER JOIN citylist on `event`.eventCity = citylist.cityId) INNER JOIN taglist on `event`.eventTag = taglist.tagId WHERE (eventTitle like '%$keyword%' OR eventLocation like '%$keyword%' OR eventContent like '%$keyword%' OR eventCity like '%$keyword%' OR eventTag like '%$keyword%'OR city like '%$keyword%' OR tag like '%$keyword%')AND tag like '%$select%' ORDER BY eventDateTime"); 
            $data_nums = mysqli_num_rows($queryData);
            $per = 9;
            $pages = ceil($data_nums/$per);
            if (!isset($_GET["page"])){ //假如$_GET["page"]未設置
                $page=1; //則在此設定起始頁數
            } else {
                $page = intval($_GET["page"]); //確認頁數只能夠是數值資料
            }
            $start = ($page-1)*$per; //每一頁開始的資料序號       
            $query = mysqli_query($conn,"SELECT * FROM (`event` INNER JOIN citylist on `event`.eventCity = citylist.cityId) INNER JOIN taglist on `event`.eventTag = taglist.tagId WHERE (eventTitle like '%$keyword%' OR eventLocation like '%$keyword%' OR eventContent like '%$keyword%' OR eventCity like '%$keyword%' OR eventTag like '%$keyword%' OR city like '%$keyword%' OR tag like '%$keyword%')AND tag like '%$select%' ORDER BY eventDateTime LIMIT ".$start. ',' .$per);


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

<br><br><br>

<?php
    //分頁頁碼
    echo '共 '.$data_nums.' 個活動,目前在第 '.$page.' 頁,共 '.$pages.' 頁';
    echo "<br /><a href=searchme?_token=FZdtM6lmFSKhJzlCGbcTTs7IiZqOC0MmTfGKgdnV&select=".$select."&keyword=".$keyword."&searchBtn=搜尋=&page=1>首頁</a> ";
    echo "第 ";
    for( $i=1 ; $i<=$pages ; $i++ ) {
        if ( $page-3 < $i && $i < $page+3 ) {
            echo "<a href=searchme?_token=FZdtM6lmFSKhJzlCGbcTTs7IiZqOC0MmTfGKgdnV&select=".$select."&keyword=".$keyword."&searchBtn=搜尋=&page=".$i.">".$i."</a> ";
        }
    }
    echo " 頁 <a href=searchme?_token=FZdtM6lmFSKhJzlCGbcTTs7IiZqOC0MmTfGKgdnV&select=".$select."&keyword=".$keyword."&searchBtn=搜尋=&page=".$pages.">末頁</a><br /><br />";
?>



    <div class="container">


        <!-- <div style="display: grid; justify-content:center ;grid-gap:3px;">
            <div class="row row-cols-12">
                <div class="col">
                    <div class="row row-cols-12" style="display: grid; justify-content:center ;grid-gap:3px;">
                        <div class="col">


                            <div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups">

                                <div class="btn-group" style="box-shadow: 0px 0px 1px 1px rgba(0,0,0,0.1);">
                                    <button type="button" class="btn "
                                        style="background-color:#41B3AC ;color:white">&#60&#60</button>
                                    <button type="button" class="btn ">1</button>
                                    <button type="button" class="btn ">2</button>
                                    <button type="button" class="btn ">3</button>
                                    <button type="button" class="btn ">4</button>
                                    <button type="button" class="btn ">5</button>
                                    <button type="button" class="btn ">6</button>
                                    <button type="button" class="btn ">7</button>
                                    <button type="button" class="btn ">8</button>
                                    <button type="button" class="btn ">9</button>
                                    <button type="button" class="btn ">10</button>
                                    <button type="button" class="btn ">11</button>
                                    <button type="button" class="btn ">...</button>
                                    <button type="button" class="btn ">27</button>
                                    <button type="button" class="btn "
                                        style="background-color:#41B3AC;color:white">&#62&#62</button>


                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div> -->


        </div>


    </div>
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



<script>
   

    



</script>







</html >