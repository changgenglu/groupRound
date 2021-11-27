<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\HomepageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// homepage
/* Route::get('/', function(){
  return view('homepage');
})->name('home'); */
Route::get('/', [HomepageController::class, 'user_identity'])->name('home');
//   ------------

Route::get('login', [UserAuthController::class, 'login'])->name('login')->middleware('alreadyLoggedIn'); // alreadyLoggedIn是防止在已登入狀態下看到登入和註冊頁面
Route::get('register', [UserAuthController::class, 'register'])->middleware('alreadyLoggedIn');
Route::post('create', [UserAuthController::class, 'create'])->name('auth.create'); // 與註冊頁面的form action相同
Route::post('check', [UserAuthController::class, 'check'])->name('auth.check');

// profile相關換成小馬的member
Route::get('profile', [UserAuthController::class, 'profile'])->name('profile')->middleware('isLogged'); // isLogged在Kernel裡接到 Middlewares/AuthCheck 未登入會拒絕訪問
//         換成其他名稱會出現 Bad Method Call 先用profile當會員中心

Route::get('logout', [UserAuthController::class, 'logout'])->name('logout');
//   ------------
// member
Route::get('/member/{id}', "App\Http\Controllers\MemberController@index")->name( 'member.index' );
Route::get('/memberF1', "App\Http\Controllers\MemberController@joinEvent")->name( 'member.join' )->middleware('isLogged')->middleware('alreadyLoggedIn');
Route::get('/memberF2', "App\Http\Controllers\MemberController@createEvent")->name( 'member.create' )->middleware('isLogged')->middleware('alreadyLoggedIn');
Route::get('/memberF3', "App\Http\Controllers\MemberController@finishedEvent")->name( 'member.finished' )->middleware('isLogged')->middleware('alreadyLoggedIn');
Route::get('/memberF4', "App\Http\Controllers\MemberController@collectEvent")->name( 'member.collect' )->middleware('isLogged')->middleware('alreadyLoggedIn');
// Route::get('/memberF6', "App\Http\Controllers\MemberController@memberComment")->name( 'member.comment' )->middleware('isLogged')->middleware('alreadyLoggedIn');

// 修改會員資料
Route::get('/memberF5', "App\Http\Controllers\MemberAlterController@index")->name( 'member.Alter' )->middleware('isLogged');
Route::resource('/MemberAlter', 'App\Http\Controllers\MemberAlterController');
//   ------------
// serch
Route::get('/eventlist', function(){
  return view('event/eventlist');
})->name('eventlist'); // 活動列表

Route::get('/searchme', function(){
  return view('search/searchme');
});


//   ------------
//活動頁面
Route::get('event/{id}', 'App\Http\Controllers\EventController@index');
//上一頁
Route::get('/back', function(){
  return redirect()->back();
});
//創建活動
Route::get('holdevent1', 'App\Http\Controllers\EventController@index1')->name('eventcreate')->middleware('isLogged');
Route::get('holdevent2', 'App\Http\Controllers\EventController@index2')->middleware('isLogged');
Route::get('holdevent3', 'App\Http\Controllers\EventController@index3')->middleware('isLogged');
Route::get('holdevent4', 'App\Http\Controllers\EventController@index4')->middleware('isLogged');
Route::post('holdevent/store1', 'App\Http\Controllers\EventController@store1');
Route::post('holdevent/store2', 'App\Http\Controllers\EventController@store2');
Route::post('holdevent/store3', 'App\Http\Controllers\EventController@store3');
//活動參加、取消、收藏
Route::post('event/join/{id}', 'App\Http\Controllers\EventController@join')->middleware('isLogged');
Route::post('event/cancel/{id}', 'App\Http\Controllers\EventController@cancel')->middleware('isLogged');
Route::post('event/like/{id}', 'App\Http\Controllers\EventController@like')->middleware('isLogged');
//編輯活動（舉辦人)
Route::get('edit1/{id}', 'App\Http\Controllers\EventController@editIndex1');
Route::get('edit2/{id}', 'App\Http\Controllers\EventController@editIndex2');
Route::get('edit3/{id}', 'App\Http\Controllers\EventController@editIndex3');
Route::get('edit4/{id}', 'App\Http\Controllers\EventController@editIndex4');
Route::post('edit/store1/{id}', 'App\Http\Controllers\EventController@edit1');
Route::post('edit/store2/{id}', 'App\Http\Controllers\EventController@edit2');
Route::post('edit/store3/{id}', 'App\Http\Controllers\EventController@edit3');

//   ------------
// feedback
Route::get('actFeed_____E', 'App\Http\Controllers\FeedbackController@index1')->middleware('isLogged');;
Route::get('memberCommentF6', 'App\Http\Controllers\FeedbackController@index')->name( 'member.comment' )->middleware('isLogged')->middleware('alreadyLoggedIn');;
Route::post('memberCommentF6', 'App\Http\Controllers\FeedbackController@store')->middleware('isLogged');;
