<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Citylist;
use App\Models\User;
use App\Models\TagList;
use Illuminate\Support\Facades\Hash;

class MemberAlterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(session()->has('LoggedUser')){
            $id = session()->get('LoggedUser');
            $User = User::find($id);
            $cityList = Citylist::all();
            $tagList = TagList::all();
            // dd($User->interestTag);
            $tag = mb_split(',', $User->interestTag); // 字串轉換成陣列
            // dd($tag);
        }
        return View ('member.f5', compact('User', 'cityList', 'tagList', 'id', 'tag'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MemberAlter  $memberAlter
     * @return \Illuminate\Http\Response
     */
    public function show(MemberAlter $memberAlter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MemberAlter  $memberAlter
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MemberAlter  $memberAlter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $User = User::find($id);
        $tagCheckbox = $request->input('tagCheckbox');   // 接收興趣input
        // dd($User->cityId);
        // 判斷是否有選擇興趣
        if (isset($tagCheckbox)) {
            $userTag = implode(',', $tagCheckbox);  // 陣列轉字串
            $User->interestTag = $userTag;
        } else {
            $User->interestTag = $User->interestTag;
        }

        // 判斷是否有上傳頭像照片
        if (isset($request->userImg)) {           
            $imageName = 
            'id='.$User->userId.'.'.time().'.'.$request->userImg->extension(); // 命名會員頭像 
            $request->userImg->move(public_path('upload'),  $imageName);  // 搬移到public/upload
            $User->userImg = $imageName;
        } else {
            $User->userImg = $User->userImg;
        }

        //判斷是否修改密碼
        if (isset($request->userPassword)) {           
            $User->userPassword = Hash::make($request->userPassword);
        } else {
            $User->userPassword = $User->userPassword;
        }

        $User->cityId = $request->userCity;
        $User->userName = $request->userName;       
        $User->userEmail = $request->userEmail;       
        $User->userIntro = $request->userIntro;
        $User->userNickName = $request->userNickName;
        $User->userBirthday = $request->userBirthday;       
        $User->save();
        
        return back()->with('notice', '會員資料更新成功！');
        
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MemberAlter  $memberAlter
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $User = User::find($id);
        $User->delete();
        // 登出
        if(session()->has('LoggedUser')){
            session()->pull('LoggedUser');
        }
        return redirect()->route('home')->with('notice', '會員資料已刪除！請重新登入！');
    }
}
