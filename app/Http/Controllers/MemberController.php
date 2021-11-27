<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Citylist;
use App\Models\User;
use App\Models\TagList;
use App\Models\Event;
use App\Models\userRecord;
use App\Models\UserComment;



class MemberController extends Controller
{
    function index($id) {
        $User = User::find($id);
        $createEvent = Event::where('userId', $id)->get(); // 發起的活動
        $userJoin = userRecord::where('userId', $id)->where('type', 'join')->get(); // 參加的活動
        $tag = mb_split(',', $User->interestTag); // 字串轉換成陣列
        $userComment = UserComment::where('userIdHold', $id)->get(); // 活動得到的回饋
        // 計算會員評價
        $rateTotal = 0;
        foreach ($userComment as $key => $value) {
            $rateTotal += $value->rate;
        }
        
        // 如果尚未獲得評價
        if ($rateTotal == 0) {
            $userRate = $rateTotal;
        } else {
            $userRate = $rateTotal % $key+1;
        }
        
        $cityList = Citylist::all();
        $tagList = TagList::all();
        $sessionId = session()->get('LoggedUser'); // 傳入session的userId
        return View ('member.index', compact(
            'User', 'cityList', 'tagList',
            'id', 'createEvent', 'tag',
            'sessionId', 'userJoin', 'userComment',
            'userRate'
        ));
    }

    // 參加的活動
    function joinEvent() {
        if(session()->has('LoggedUser')){
            $id = session()->get('LoggedUser');
            $userJoin = userRecord::where('userId', $id)->where('type', 'join')->get();
            
        }
        return view('member.F1', compact('id', 'userJoin'));
    }

    // 發起的活動
    function createEvent() {
        if(session()->has('LoggedUser')){
            $id = session()->get('LoggedUser');
            $createEvent = Event::where('userId', $id)->get(); // 發起的活動
        }
        return view("member.F2", compact('id', 'createEvent'));
    }

    // 已結束的活動
    function finishedEvent() {
        if(session()->has('LoggedUser')){
            $id = session()->get('LoggedUser');            
            $userJoin = userRecord::where('userId', $id)->where('type', 'join')->get();
            $allFinish = Event::where('deleted_at', null)->get();
            // 標示已結束活動
            foreach ($allFinish as $allFinish) {
                if ($allFinish->eventDateTime < date('Y-m-d H:i:s')) {
                    $allFinish->deleted_at = date('Y-m-d H:i:s');
                    $allFinish->save();
                }
            }
            
            
        }
        return view("member.F3", compact('id', 'userJoin'));
    }
    
    // 收藏的活動
    function collectEvent() {
        if(session()->has('LoggedUser')){
            $id = session()->get('LoggedUser');
            $userLike = userRecord::where('userId', $id)->where('type', 'like')->get();
        }
        return view("member.F4", compact('id', 'userLike'));
    }
    
    // 團員的回饋
    function memberComment() {
        if(session()->has('LoggedUser')){
            $id = session()->get('LoggedUser');
        }
        return view("member.F6", compact('id'));
    }
}
