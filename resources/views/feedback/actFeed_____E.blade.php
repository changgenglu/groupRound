<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="icon" href="../img/logo.png" type="image/gif" sizes="16x16">
    <title>團團轉 Group Round</title>

    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <!-- <script src="./js/jquery.min.js"></script> -->
    <style>
        /* body {
            margin-top: 100px;

        } */
        /* body {
            background-color: #f6f7f8;
        } */

        /* img {
            width: 88px;
            border-radius: 100%;
            margin: 10px;
        } */

        h1 {
            font-size: 2.5em;
            font-weight: bold;
        }

        h5 {
            font-weight: bold;


        }
        @charset "UTF-8";


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
    <br>
    <br>
    <br>
    <div class="container">
        <div class="container">
          <form action="memberCommentF6" method="POST">

            <div class="row">
                <div class="col-1 ">
                </div>
                <div class="col-4 ">
                    <div class="container">
                        <div class="row">
                            <div class="row">
                                <h5> 2021/10/16 星期天</h5>
                            </div>
                            <div class="row">
                                <h1>陽明山健行</h1>
                            </div>
                            <div class="row">
                                <div class="col-4"><img src="../img/1065-IMG_2529 (1).jpg" alt=""style="width: 88px;border-radius: 100%; margin: 10px;"></div>
                                <div class="col-8">
                                    <br>
                                    <div class="comtainer">
                                        <div class="row ">
                                            <h5>&nbsp;&nbsp;團長</h5>
                                        </div>

                                        <div class="comtainer">
                                            <div class="row">
                                                <div class="row">
                                                    <h5>&nbsp;&nbsp;新北Mark</h5>   
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>


                            <div class="row">
                                <h5>聯絡方式：</h5>
                            </div>
                            <div class="row">
                                <h6> 電話新北市01-123-123</h6>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-7 ">

                    <div class="row">
                        <div class="container">
                            <div class="container">
                                <div class="container">
                                  {{--                  星星評價             --}}
                                    <div style="box-sizing: border-box;padding-top:0px ; padding-right: 0px;">
                                        <h5>這次的活動如何呢?將你的感受告訴給主辦人吧！ </h5>
                                        <span style="font-size:20px;">有待加強 &nbsp;&nbsp;</span><span style="font-size:30px;"> </span>
                                          <i class="fa fa-star fa-2x" data-index="1" ></i>
                                          <i class="fa fa-star fa-2x" data-index="2" ></i>
                                          <i class="fa fa-star fa-2x" data-index="3" ></i>
                                          <i class="fa fa-star fa-2x" data-index="4" ></i>
                                          <i class="fa fa-star fa-2x" data-index="5" ></i>
                                        
                                        <span style="font-size:20px;">&nbsp;&nbsp;&nbsp;&nbsp;棒極了！</span>
                                        

                                          
                                          {{-- 星星評價  的 js  和引用 --}}
                                          
                                          
                                          <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
                                          <script>
                                              var ratedIndex= -1;
                                              $(document).ready(function(){
                                                  resetStarColors();
                                                  
                                                  if(localStorage.getItem('ratedIndex')!=null){}
                                                  setStars(parseInt(localStorage.getItem('ratedIndex')));
                                                  // uID=localStorage.getITem('uID');
                                      
                                                  $('.fa-star').on('click',function(){

                                                    
                                                      document.getElementById("bbr").remove();
                                                      ratedIndex=parseInt($(this).data('index'));
                                                      // localStorage.setItem('ratedIndex',ratedIndex);
                                                      // var inp=document.createElement("input");
                                                      // var cim_sAB=inp.setAttribute("id","bbr");
                                                      // document.getElementById("bbr1").appendChild(inp);
                                                      var inp1=document.createElement("input");
                                                      var cim_sAB=inp1.setAttribute("type","text");
                                                     
                                                      inp1.setAttribute("name","rate");
                                                      inp1.setAttribute("id","bbr");
                                                      inp1.setAttribute("style","opacity: 0");
                                                      
                                                      document.getElementById("bbr1").appendChild(inp1) 
                                                      document.getElementById("bbr").value=ratedIndex;

                                                      // saveToTheDB();
                                                  })
                                      
                                                  $('.fa-star').mouseover(function(){
                                                      resetStarColors();
                                                      $('.fa-star')
                                                      var currentIndex = parseInt($(this).data('index'));
                                                      setStars(currentIndex);
                                                          
                                                      });
                                                      $('.fa-star').mouseleave(function(){
                                                          resetStarColors();
                                                          if(ratedIndex !=-1)
                                                              setStars(ratedIndex);
                                                        
                                      
                                                  });
                                              });
                                              // function saveToTheDB(){
                                              //     $.ajax({
                                              //         url:"1101.php",
                                              //         method:"POST",
                                              //         dataType:'json',
                                              //         data:{
                                              //             save:1,
                                              //             uID:uID,
                                              //             ratedIndex:rateIdex
                                              //         },success:function(r){
                                              //             uID=r.uid;
                                              //             localStorage.setItem('uID',uID);
                                              //         }
                                              //     });
                                              // }
                                      
                                              function setStars(max){
                                                  for(var i=0;i<max;i++)
                                                          $('.fa-star:eq('+i+')').css('color','yellow');
                                              }
                                              function resetStarColors(){
                                                  $('.fa-star').css('color','lightgray');
                                              }
                                      
                                      
                                          </script>
                                            {{-- 星星評價  的 js  和引用 --}}
                                          
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="container">
                            <div class="container">
                                <div class="container">


                                    <div style="box-sizing: border-box;padding-top: 20px; padding-right:150px;">
                                    <h5>請留下您的意見，祝福您有美好旅程！ </h5>
                                    <div class="form-floating">
                                          @csrf

                                            <textarea name="comment" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                                            <label for="floatingTextarea2"></label>
                                            
                                            {{-- userId<input type="text" name="userId"><br>
                                            
                                            userName<input type="text" name="userName"><br>
                                            userNickName<input type="text" name="userNickName"><br>
                                            userPassword<input type="text" name="userPassword"><br>
                                            userBirthday<input type="text" name="userBirthday"><br>
                                            userCity<input type="text" name="userCity"><br>
                                            userIntro<input type="text" name="userIntro"><br>
                                            userTag<input type="text" name="userTag"><br>
                                            userGenger<input type="text" name="userGenger"><br>
                                            userImg<input type="text" name="userImg"><br>
                                            eventId<input type="text" name="eventId"><br>
                                            eventTitle<input type="text" name="eventTitle"><br>
                                            eventContent<input type="text" name="eventContent"><br>
                                            eventImg<input type="text" name="eventImg"><br>
                                            eventDateTime<input type="text" name="eventDateTime"><br>
                                            CityId<input type="text"name="cityId"><br>
                                            eventLocation<input type="text" name="eventLocation"><br>
                                            peopleNumber<input type="text" name="peopleNumber"><br>
                                            userGenger<input type="text" name="userGenger"><br>
                                            eventTag<input type="text" name="eventTag"><br> --}}
                                            <div id="bbr1" >

                                              <input id="bbr" type="text" style="opacity: 0">
                                            </div>
                                          </div>
                                          
                                          
                                          
                                          
                                        </div>
                                        
                                      </div>
                                    </div>
                                  </div>
                                  
                                </div>
                              </div>
                              
                              
                            </div>
                          </div>
                          
                          <div class="row" style="padding-top:20px ;">
            <div class="col-1">
              
            </div>
            <div class="col-2">
              <div class="container">

                <button type="button" class="btn " style="background-color:  #F0F0F0;">上一步</button>
              </div>
            </div>
            <div class="col-6">
              
            </div>
            
            
            
            <div class="col-3 ">
              
              
              
              
              <button type="submit" class="btn" style="background-color: #41B3AC; color: aliceblue    ;">確認</button>
              
              
            </div>
        
            
          </form>
            
          </div>

    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    

    
    
   <footer class="bg-dark text-center text-lg-start">
        <div class="container ">
            <!-- Copyright -->
            <div class="text-center p-4 text-light">
                <span>© 2021 Copyright GroupRound團團轉共遊平台製作小組</span>
            </div>
        </div>
    </footer>


    <script src="./js/bootstrap.min.js"></script>
</body>

</html>