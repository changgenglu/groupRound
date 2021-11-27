@extends('layouts.alter')

@section('title')
    收藏的活動
@endsection

@section('content')
    <section>
        <h2>收藏的活動</h2> 
        @if (sizeof($userLike) == 0)
            <div style="height: 300px; padding-top:100px;text-align: center;">
                <h3 style="color:gray;">尚未收藏活動</h3>
            </div>
        @else
            <div class="AllCard" style="margin-bottom: 220px">
                @foreach ($userLike as $like)
                    <a href="/event/{{ $like->event->eventId }}">
                        <div class="card" id="card">
                            <div id="cardImg">
                                <img src="/eventImg/{{ $like->event->eventImg }}" class="card-img-top" alt="...">
                            </div>
                            <div class="card-body">

                                <p class="card-text">{{ $like->event->eventTitle }}</p>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted">{{ date('m月d日 H:i',strtotime($like->event->eventDateTime)) }}</small>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        @endif
        
    </section>
    <br>
    <br>
    <br>
    
@endsection