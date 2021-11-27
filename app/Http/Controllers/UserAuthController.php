<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\Citylist;
use App\Models\User_1;
use App\Models\TagList;
use App\Models\UserInterestTag;
use App\Models\Event;

class UserAuthController extends Controller
{
    // 登入頁面
    function login(){
        return view('auth/login');
    }

    // 註冊頁面
    function register(){
        return view('auth/register');
    }

    // 城市列表
    public function index()
    {
        $cityList = Article::all();
        return view('auth/register')->with('cityList',$cityList);
    }

    // 註冊>新建會員資料
    function create(Request $request){
        // return $request->input(); // 測試
        // dd($request->all());

        // 驗證請求
        $request->validate([
            'userEmail'=>'required|email|unique:user', // unique:tablename
            'userPassword'=>'required|min:6|max:12',
            'userNickName'=>'required|min:1|max:30|unique:user',
            'userName'=>'required|min:1|max:30',
            'cityId'=>'required',
            'userGender'=>'required',
            'userBirthday'=>'required',
            // 'userImg'=>'mimes:jpg,png,jpeg|max:3072',
            'noticeCheck'=>'required|in:1'
        ]);
        
        // 驗證通過後送入表單

        // $user = new User;
        /* $user = new User_1;
        $cityList = Citylist::all();
        $user->userEmail = $request->userEmail;
        $user->userPassword = Hash::make($request->userPassword);
        $user->userNickName = $request->userNickName; // 表單大小寫不同
        $user->userName = $request->userName;
        $user->cityId = $request->cityId;
        $user->userGender = $request->userGender;
        $user->userBirthday = $request->userBirthday;
        if($request->userImg){
            $user->userImg = $request->userImg;
        }
        $query = $user->save(); */

        
        // 用QUERY做到和上面同樣效果
        
        $cityList = Citylist::all();
        $query = DB::table('user')->insert([
            'userEmail'=>$request->userEmail,
            'userPassword'=>Hash::make($request->userPassword),
            'userNickName'=>$request->userNickName,
            'userName'=>$request->userName,
            'cityId'=>$request->cityId,
            'userGender'=>$request->userGender,
            'userBirthday'=>$request->userBirthday,
            // 'userImg'=>$request->userImg,
        ]); 

        if($query){
            return redirect('login')->with('success', '註冊成功！');
        }else{
            return back()->with('fail', '發生錯誤，請再提交一次');
        }
    }

    // 登入表單格式檢查
    function check(Request $request){
        // return $request->input(); 測試
        $request->validate([
            'userEmail'=>'required|email',
            'userPassword'=>'required|min:6|max:12'
        ]);

        // 格式檢查成功後驗證是否為已註冊會員(DB裡有無資料)
        // $user = User::where('email', '=', $request->email)->first();

        // 用QUERY做到和上面同樣效果
        $user = DB::table('user')->where('userEmail', $request->userEmail)->first();
        if($user){
            if(Hash::check($request->userPassword, $user->userPassword)){

                // 登入成功 給予註記後跳轉回上一頁(用下面function)
                $request->session()->put('LoggedUser', $user->userId);
                return redirect('profile'); // previous
            }else{
                return back()->with('fail', '密碼錯誤');
            }
        }else{
            return back()->with('fail', '未註冊的信箱');
        }
    }

    function profile(){
        // return view('member/profile');

        // 會員中心名稱和郵件(抓取資料)
        if(session()->has('LoggedUser')){
            // $user = User::where('id', '=', session('LoggedUser'))->first();
            // 用QUERY做到和上面同樣效果
            $user = DB::table('user')->where('userId', session('LoggedUser'))->first();
            $data = [
                'LoggedUserInfo'=>$user
            ];
        }
        return view('homepage', $data);
        // return redirect()->intended('member/index', $data);
        // return back()->with('success','登入成功');
    }

    function logout(){
        if(session()->has('LoggedUser')){
            session()->pull('LoggedUser');
            return redirect('login');
        }
    }

    // 重設密碼
    /* function reser_password(){
        return view('auth/reser_password');
    } */
}
