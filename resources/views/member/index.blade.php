@extends('layouts.main')

@section('title')
    會員中心
@endsection

@section('content')
<article>
    <div id="leftDiv" style="text-align: center;
     /* border: 1px solid rgb(206, 206, 206); height: 750px; padding-top:30px; */
     ">
        <img src="/upload/{{ $User->userImg }}" alt="" style="width: 200px;">
        <h2 name="userName">{{ $User->userName }}</h2>
        <h6 name='userNickName'>{{ $User->userNickName }}</h6>
        <h6 name='userEmail'>{{ $User->userEmail }}</h6>
        <hr className='hr_slid'>
        <h4>活動滿意度</h4>
        

        <div name='userEvaluate' style="margin-top: -15px;">
            @for ($i = 0; $i < $userRate; $i++)
                <img src="/img/shiny.svg" alt="">
            @endfor
            @for ($i = 0; $i < 5-$userRate; $i++)
                <img src="/img/star.svg" alt="">
            @endfor
        </div>
        <hr className='hr_slid'>
        <div>
            <h3>個人簡介</h3>
            <p>
                {{ $User->userIntro }}
            </p>
        </div>
        <hr className='hr_slid'>
        <div>
            @if($sessionId == $id)
                <a href="{{ route('member.Alter') }}">修改個人資料</a>
            @endif
        </div>

    

    </div>
    <div id="rightDiv">
        <section>
            <h2>發起的活動</h2>
           
            <div class="AllCard">
                @if (sizeof($createEvent) == 0)
                    <div style="height: 300px; padding-top:100px;text-align: center;">
                        <h3 style="color:gray;">尚未發起活動</h3>
                    </div>
                @else
                    <div class="AllCard">
                        @foreach ($createEvent as $key => $value)
                            <a href="/event/{{ $value->eventId }}">
                                <div class="card" id="card">
                                    <div id="cardImg">
                                        <img src="/eventImg/{{ $value->eventImg }}" class="card-img-top" alt="">
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text">{{ $value->eventTitle }}</p>
                                    </div>
                                    <div class="card-footer">
                                        <small class="text-muted">{{ $value->eventDateTime }}</small>
                                    </div>
                                </div>
                            </a>
                            @if ($key == 2)
                                @break;
                            @endif
                        @endforeach
                    </div>
                
                @endif
            </div>
            <br><br>
            <button type="button" class="btn btn-orange btn-sm"><a href="{{ route('member.create') }}"  style="color: white">看更多</a></button>
        </section>
        <hr class='hr_slid'>
        <section>
            <h3>參加的活動</h3>
            @if (sizeof($userJoin) == 0)
                <div style="height: 300px; padding-top:100px;text-align: center;">
                    <h3 style="color:gray;">尚未參加活動</h3>
                </div>
            @else
                <div class="AllCard">
                    @foreach ($userJoin as $key => $value)
                        <a href="/event/{{ $value->event->eventId }}">
                            <div class="card" id="card">
                                <div id="cardImg">
                                    <img src="/eventImg/{{ $value->event->eventImg }}" class="card-img-top" alt="...">
                                </div>
                                <div class="card-body">

                                    <p class="card-text">{{ $value->event->eventTitle }}</p>
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted">{{ date('m月d日 H:i',strtotime($value->event->eventDateTime)) }}</small>
                                </div>
                            </div>
                        </a>
                        @if ($key == 2)
                            @break;
                        @endif
                    @endforeach
                </div>
            @endif
            <br><br>
            <button type="button" class="btn btn-orange btn-sm"><a href="{{ route('member.join') }}" style="color: white">看更多</a></button>
        </section>
        <section>
            
            @if ($tag[0] !== '')
            <hr class='hr_slid'>
                <h3>興趣</h3>
                <div class="row">
                    @foreach ($tag as $key => $value)
                        <p id="userInterest" class="col-3">{{ $value }}</p>
                    @endforeach
                </div>
            @endif
        </section>
        <br><br><br><br><br>
    </div>
</article>
@endsection