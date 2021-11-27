@extends('layouts.alter')

@section('title')
    團員的回饋
@endsection

@section('content')
    
    <section>
        <h2>團員的回饋</h2>
        <div id="userComment">
        
            <div id="commentTopic" class="row">
                <div class="col" id="topicText">
                    <p>2021/10/26 星期日</p>
                    <h3><b>陽明山健行</b></h3>
                    <br>
                    <p>地點：台北陽明山</p>
                    <p>團員：小明、小華、小美</p>
                </div>
                <div class="col" id="toppicImg">
                    <img src="/img/Yangming.jpg" alt="" style="width: 300px;">
                </div>
            </div>
        
            <div id="commentContent" class="row">
            
                <div class="col-3" id="commentImg">
                    <img src="/img/Ming.jpg" alt="" style="width: 100px;">
                </div>
            
                <div class="col-9 row">
                
                    <div class="col-7" id="commentText">
                        <b>小明 </b>對你的活動表示：
                        <p>夭壽讚！</p>
                    </div>
                
                    <div class="col-5" id="commentStar">
                        <img src="/img/star.svg" alt="">
                        <img src="/img/star.svg" alt="">
                        <img src="/img/star.svg" alt="">
                        <img src="/img/star.svg" alt="">
                        <img src="/img/star.svg" alt="">
                    </div>
                
                </div>
            </div>
        
            <div id="commentContent" class="row">
                <div class="col-3" id="commentImg">
                    <img src="/img/May.jpg" alt="" style="width: 100px;">
                </div>
                <div class="col-9 row">
                    <div class="col-7" id="commentText">
                        <b>小美 </b>對你的活動表示：
                    
                        <p>好臭。</p>
                    </div>
                    <div class="col-5" id="commentStar">
                        <img src="/img/star.svg" alt="">
                        <img src="/img/star.svg" alt="">
                    
                    </div>
                </div>
            </div>
        
            <button id="commentSubmitBtn" class="btn btn-orange">看更多</button>
        </div>
    
    
        <div id="userComment">
        
            <div id="commentTopic" class="row">
                <div class="col" id="topicText">
                    <p>2021/10/26 星期日</p>
                    <h3><b>陽明山健行</b></h3>
                    <br>
                    <p>地點：台北陽明山</p>
                    <p>團員：小明、小華、小美</p>
                </div>
                <div class="col" id="toppicImg">
                    <img src="/img/Yangming.jpg" alt="" style="width: 300px;">
                </div>
            </div>
        
            <div id="commentContent" class="row">
            
                <div class="col-3" id="commentImg">
                    <img src="/img/Ming.jpg" alt="" style="width: 100px;">
                </div>
            
                <div class="col-9 row">
                
                    <div class="col-7" id="commentText">
                        <b>小明 </b>對你的活動表示：
                        <p>夭壽讚！</p>
                    </div>
                
                    <div class="col-5" id="commentStar">
                        <img src="/img/star.svg" alt="">
                        <img src="/img/star.svg" alt="">
                        <img src="/img/star.svg" alt="">
                        <img src="/img/star.svg" alt="">
                        <img src="/img/star.svg" alt="">
                    </div>
                
                </div>
            </div>
        
            <div id="commentContent" class="row">
                <div class="col-3" id="commentImg">
                    <img src="/img/May.jpg" alt="" style="width: 100px;">
                </div>
                <div class="col-9 row">
                    <div class="col-7" id="commentText">
                        <b>小美 </b>對你的活動表示：
                    
                        <p>好臭。</p>
                    </div>
                    <div class="col-5" id="commentStar">
                        <img src="/img/star.svg" alt="">
                        <img src="/img/star.svg" alt="">
                    
                    </div>
                </div>
            </div>
        
            <button id="commentSubmitBtn" class="btn btn-orange">看更多</button>
        </div>
    
    </section>
@endsection