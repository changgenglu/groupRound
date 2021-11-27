<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\userRecord;
use App\Models\user;
use App\Models\tagList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    function index($id) {   //活動頁面
        if(session()->has('LoggedUser')){
            $user = User::where('userId', session('LoggedUser'))->first()->userId;  //確認使用者是否登入，並取得userId
        }else{
            $user = 0;
        }
        
        //取得資料庫資料
        $db = Event::find($id);
        $eventTitle = $db -> eventTitle;
        $eventContent = $db -> eventContent;
        $eventImg = $db -> eventImg;
        $DateTime = $db -> eventDateTime;
        $eventDateTime =  date('Y年m月d日',strtotime($DateTime)); //將dateime轉為固定格式
        $eventDateTime1 =  date('H時i分',strtotime($DateTime));  //將dateime轉為固定格式
        $eventDateTime2 =  date('m月d日 H:i',strtotime($DateTime)); //將dateime轉為固定格式
        $weekarray=array("日","一","二","三","四","五","六");
        $weekday = $weekarray[date("w",strtotime($DateTime))];
        $eventCity = $db -> eventCity;
        $eventLocation = $db -> eventLocation;
        $peopleNumber = $db -> peopleNumber;
        $userGender = $db -> userGender;
        $holduser = $db -> userId;
        $eventTag = $db -> tagList1 -> tag; //外鍵
        $eventTag2 = $db -> tagList2 -> tag; //外鍵
        $userName = $db -> user -> userName; //外鍵
        $userImg = $db -> user -> userImg; //外鍵
        $userJoin = $db -> userRecord->where('type','join'); //外鍵一對多
        $userLike = $db -> userRecord->where('type','like'); //外鍵一對多

        //compact打包多個變數
        $viewModel = compact(
            "eventTitle", 
            "eventContent", 
            "eventImg", 
            "eventDateTime",
            "eventDateTime1",
            "eventDateTime2",
            "weekday",
            "eventCity", 
            "eventLocation", 
            "peopleNumber", 
            "userGender",
            "eventTag", 
            "eventTag2", 
            "userName", 
            "userImg", 
            "userJoin",
            "id",
            "userLike",
            "holduser",
            "user",
        );
        // dd($viewModel);
        return view("event.eventPageC", $viewModel);
    }
    //創建活動
    function index1() {
        return view('event.holdEventC1');
    }
    function index2() {
        return view('event.holdEventC2');
    }
    function index3() {
        return view('event.holdEventC3');
    }
    function index4() {
        return view('event.holdEventC4');
    }
    function store1(Request $request)
    {
        if(session()->has('LoggedUser')){
            $user = User::where('userId', session('LoggedUser'))->first()->userId; //確認使用者是否登入，並取得userId
        }
        $event = new Event();
        $event->userId = $user;
        $event->eventTag = $request->array1;
        $event->eventTag2 = $request->array2;
        $result = $event->save();
        // $event -> create($request -> all()); 另一種做法
        return 'holdevent2';
    }

    function store2(Request $request)
    {
        $last = DB::table('event') -> orderByDesc('eventId') -> first() ->eventId; //取得最新加入的活動資料id
        $event=Event::find($last);
        $imgName = $request->img->getClientOriginalName();  //取得照片名字
        $request->img->move(public_path('eventImg'),  $imgName); //儲存照片路徑
        $event->eventImg = $imgName;
        $event->eventTitle = $request->title;
        $event->eventContent = $request->content;
        $event->save();
        return redirect("/holdevent3");
    }
    function store3(Request $request)
    {
        $last = DB::table('event') -> orderByDesc('eventId') -> first() ->eventId; //取得最新加入的活動資料id
        $event=Event::find($last);
        $event->eventDateTime = $request->time;
        $event->eventLocation = $request->location;
        $event->peopleNumber = $request->people;
        $event->eventCity = $request->city;
        $event->userGender = $request->gender;
        $event->save();
        return redirect("/holdevent4");
    }
    //編輯活動
    function editIndex1($id){
        return view('event.holdEventC1', compact('id'));
    }
    function editIndex2($id){
        $event = Event::find($id);
        $eventTitle = $event->eventTitle;
        $eventContent = $event -> eventContent;
        $eventImg = $event -> eventImg;
        $viewModel = compact(
            "eventTitle", 
            "eventContent", 
            "eventImg", 
            "id"
        );
        return view('event.holdEventC2', $viewModel);
    }
    function editIndex3($id){
        $event = Event::find($id);
        $DateTime = $event -> eventDateTime;
        $eventDateTime =  date('Y-m-d\TH:i',strtotime($DateTime)); //將dateime轉為固定格式
        $eventCity = $event -> eventCity;
        $eventLocation = $event -> eventLocation;
        $peopleNumber = $event -> peopleNumber;
        $userGender = $event -> userGender;
        
        $viewModel = compact(
            "eventDateTime", 
            "eventCity", 
            "eventLocation",
            "peopleNumber", 
            "userGender",  
            "id"
        );
        return view('event.holdEventC3', $viewModel);
    }
    function editIndex4($id){
        return view('event.holdEventC4', compact('id'));
    }

    function edit1(Request $request, $id)
    {
        $event = Event::find($id);
        $event->eventTag = $request->array1;
        $event->eventTag2 = $request->array2;
        $result = $event->save();
        return "success";
    }
    function edit2(Request $request, $id)
    {
        $event = Event::find($id);
        $imgName = $request->img->getClientOriginalName();  //取得照片名字
        $request->img->move(public_path('eventImg'),  $imgName); //儲存照片路徑
        $event->eventImg = $imgName;
        $event->eventTitle = $request->title;
        $event->eventContent = $request->content;
        $event->save();
        return redirect("edit3/$id");
    }
    function edit3(Request $request, $id)
    {
        $event = Event::find($id);
        $event->eventDateTime = $request->time;
        $event->eventLocation = $request->location;
        $event->peopleNumber = $request->people;
        $event->eventCity = $request->city;
        $event->userGender = $request->gender;
        $event->save();
        return redirect("edit4/$id");
    }

    //參加活動
    function join(Request $request, $id)
    {
        if(session()->has('LoggedUser')){
            $user = User::where('userId', session('LoggedUser'))->first()->userId; //確認使用者是否登入，並取得userId
        }
        $userRecord = new UserRecord();
        $userRecord -> userId = $user; 
        $userRecord -> eventId = $id;
        $userRecord -> type = "join";
        $userRecord->save();
        return redirect("event/$id");
    }

    function cancel(Request $request, $id)
    {
        if(session()->has('LoggedUser')){
            $user = User::where('userId', session('LoggedUser'))->first()->userId; //確認使用者是否登入，並取得userId
        }
        $matchThese = ['eventId' => $id, 'userId' => $user, 'type' =>'join'];  //多個where條件
        UserRecord::where($matchThese)->delete();
        return redirect("event/$id");
    }

    function like(Request $request, $id)
    {
        if(session()->has('LoggedUser')){
            $user = User::where('userId', session('LoggedUser'))->first()->userId; //確認使用者是否登入，並取得userId
        }
        $result = 'error';
        $matchThese = ['eventId' => $id, 'userId' => $user, 'type' =>'like']; //多個where條件
        $like = UserRecord::where($matchThese)->first();
        if(isset($like)){
            UserRecord::destroy($like->id);
            $result = 'delete';
        }else{
            $userRecord = new UserRecord();
            $userRecord -> userId = $user;  //測試
            $userRecord -> eventId = $id;
            $userRecord -> type = "like";
            $userRecord->save();
            $result = 'success';
        }
        return $result;
    }

}
