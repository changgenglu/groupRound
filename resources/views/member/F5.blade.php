@extends('layouts.main')

@section('title')
    修改基本資料
@endsection

@section('content')
    <article>

        <form action="{{ route('MemberAlter.update', $id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div id="leftDiv">
                <figure>
                    {{-- 更換頭像 --}}
                    <label class="btn ">                        
                        <img id="previewImg" src="/upload/{{ $User->userImg }}" alt="" style="width: 200px;"/>                        
                        <input type="hidden" name="MAX_FILE_SIZE" value="5242880"/>
                        <input 
                            type="file"
                            onchange="readURL(this)"
                            name="userImg" 
                            style="display:none;" 
                            value="{{ $User->userImg }}" 
                            accept="image/png, image/jpeg" 
                            targetID="previewImg"
                            />
                        <figcaption id="submitUserPhoto">
                            <span style="color: #0d6efd;">更換頭像</span>
                        </figcaption>
                    </label>
                </figure>
                <script>
                    
                </script>
               
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
                    
                    <h2>基本資料</h2>
                    <div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-default">姓&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;名</span>
                            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="" value="{{ $User->userName }}" maxlength="30" name="userName">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-default">暱&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;稱</span>
                            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="" value="{{ $User->userNickName }}" maxlength="30" name="userNickName">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-default">密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;碼</span>
                            {{-- pattern="(?=.*\d).{8,}" --}}
                            <input type="password" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="*********" value="" maxlength="20" name="userPassword">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-default">電子信箱</span>
                            <input type="email" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="" value="{{ $User->userEmail }}" maxlength="50" name="userEmail">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-default">生&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;日</span>
                            <input type="date" class="form-control" aria-label="Sizing example input" value="{{ $User->userBirthday }}" aria-describedby="inputGroup-sizing-default" id="date" name="userBirthday">
                        </div>
                        
                        {{-- 使用者所在地 --}}
                        <select name="userCity" class="form-select" aria-label="Default select example">
                            <option selected>所在地</option>
                            @foreach ($cityList as $city)
                                <option value="{{ $city->cityId }}" {{ ($User->cityId == $city->cityId) ? 'selected' : '' }}>{{ $city->city }}</option>
                            @endforeach
                        </select>
                    </div>
                </section>
                <hr class='hr_slid'>
                <section>
                    <h2>自我介紹</h2>
                    <div>
                        <textarea class="form-control" rows="3" maxlength="255" name="userIntro">{{ $User->userIntro }}</textarea>
                    </div>
                </section>
                <hr class='hr_slid'>
                <section>
                    <h3>興趣</h3>
                    <div class="row" >
                        {{-- 列出使用者的興趣 --}}
                        <div class="row" id="intMsg">
                            @foreach ($tag as $key => $value)
                                @if ($value !== '')
                                    <p id="userInterest" class="col-3">{{ $value }}</p>
                                @endif
                            @endforeach
                        </div>
                        {{-- 觸發彈出視窗 --}}
                        
                            <button type="button" id="addInterest"  style="border: none;width: 50px;" onclick="popDiv();" class="col-3">+</button>
                        
                    </div>

                   {{-- 彈出視窗 --}}
                    <div id="popDiv" class="popDiv">
                        
                        <div class="close">
                            <button type="button" onclick="closePop()" class="btn btn-danger btn-sm">X</button>
                        </div>

                        {{-- 選擇興趣 --}}
                        <div class="row" id="pickDiv">
                            @foreach ($tagList as $tag)
                            <label for="tag{{ $tag->tagId }}">
                                <input type="checkbox" class="col-3" id="tag{{ $tag->tagId }}" name="tagCheckbox[]" value="{{ $tag->tag }}" onClick="onCheckBox(this);" />
                                <span>{{ $tag->tag }}</span>                                
                            </label>
                            @endforeach 
                        </div>
                        
                        <div class="sendPick">
                            <button type="button" onclick="sendPop()" class="btn btn-orange">確認修改</button>
                        </div>

                    </div>
                </section>
                <div id="submitBtn" class="d-grid gap-2" style="text-align: center;">
                    {{-- 送出表單 --}}
                    <button class="btn btn-orange btn-lg" type="submit">
                        <span>修改送出</span>                        
                    </button>
                </div>
            </div>
        </form>
        <div id="rightDiv" class="userDelete">
            <form action="{{ route('MemberAlter.destroy', $id) }}" method="POST">
                @csrf
                @method('delete')
                
                <button type="button" name="userDelete" style="font-size: 12px;border: none;background-color: #f6f7f8;" onclick="userDeleteData()">刪除會員資料</button>

                {{-- 彈出視窗 --}}
                <div id="wornningPop" class="popDiv">
                    <p>確定要刪除資料？</p>
                    <div id="deleteCheck">
                        <button type="button" onclick="popClose()" class="btn btn-success">返回</button>
                        <button type="submit" name="dataDelete" onclick="popClose()" class="btn btn-danger">確認</button>
                    </div>

                </div>
                
               

            </form>
        </div>
        

    </article>
    <script>
        // 更換頭像預覽
        function readURL(input){                     
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

        // 刪除資料警告
        function userDeleteData() {
            var popBox = document.getElementById("wornningPop");
            var bigCover = document.getElementById("bigCover");
            popBox.style.display = "block";
            bigCover.style.display = "block";            
        };
        function popClose() {
            let popDiv = document.getElementById("wornningPop");
            var b_Cover = document.getElementById("bigCover");
            popDiv.style.display = "none";
            b_Cover.style.display = "none";
        };
        

        // 選擇興趣彈出視窗
        function popDiv() {
            var popBox = document.getElementById("popDiv");
            var intCover = document.getElementById("intCover");
            popBox.style.display = "block";
            intCover.style.display = "block"; 
        };

        // 關閉視窗
        function closePop() {
            let popDiv = document.getElementById("popDiv");
            var i_Cover = document.getElementById("intCover");
            popDiv.style.display = "none";
            i_Cover.style.display = "none";
        }
        // 興趣確認送出
        function sendPop() {
            let popDiv = document.getElementById("popDiv");
            var i_Cover = document.getElementById("intCover");
            popDiv.style.display = "none";
            i_Cover.style.display = "none";

            // 送出陣列
            var id = document.getElementsByName('tagCheckbox[]');
            var value = new Array();
            for (var i = 0; i < id.length; i++) {
                if (id[i].checked){
                    value.push(id[i].value);
                }
            }
            // 預覽興趣
            var msg = '';
            value.forEach(e);
            document.getElementById('intMsg').innerHTML = msg;
            function e(item, index) {
              msg += '<p id="userInterest" class="col-3">' + item + '</p>';
            }
        };

        
        // 限制選擇興趣的數量
        var maxChoices = 5;
        var flag = 0;
        function onCheckBox(checkbox) {
            var items = document.getElementsByName("tagCheckbox[]");
            if (checkbox.checked) {
                flag++;
            } else {
                flag--;
            };

            if (flag < maxChoices) {
                for (var i = 0; i < items.length; i++) {
                    if (!items[i].checked) {
                        items[i].disabled = false;
                    };
                };
            } else {
                for (var i = 0; i < items.length; i++) {
                    if (!items[i].checked) {
                        items[i].disabled = true;                        
                    };
                };
            };
            var int = document.getElementsByName('tagCheckbox[]')[0].value;
            console.log('intTag='+int);
        }
       

    </script>

@endsection