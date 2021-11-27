@extends('layouts.alter')

@section('title')
    發起的活動
@endsection


@section('content')
    <section>
        <h2>發起的活動</h2>
        @if (sizeof($createEvent) == 0)
        <div style="height: 300px; padding-top:100px;text-align: center;">
            <h3 style="color:gray;">尚未發起活動</h3>
        </div>
        @else
        
        <div class="AllCard" style="margin-bottom: 220px">
            @foreach ($createEvent as $create)                

                    <a href="/event/{{ $create->eventId }}">
                        <div class="card" id="card">
                            <div id="cardImg">
                                <img src="/eventImg/{{ $create->eventImg }}" class="card-img-top" alt="">
                            </div>
                            <div class="card-body">
                                <p class="card-text">{{ $create->eventTitle }}</p>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted">{{ $create->eventDateTime }}</small>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        
        @endif
        
    </section>
    <br><br><br>
@endsection