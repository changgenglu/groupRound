<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class HomepageController extends Controller
{
    function user_identity(){

        $user = 0;
        
        if(session()->has('LoggedUser')){
            $user = User::where('userId', session('LoggedUser'))->first()->userId;
        }

        return view('homepage', compact($user));
        return view('layouts/app', compact($user));
        return view('layouts/alter', compact($user));
        return view('layouts/main', compact($user));
        return view('eventPageC', compact($user));
        return view('holdEventC1', compact($user));
        return view('holdEventC2', compact($user));
        return view('holdEventC3', compact($user));
        return view('holdEventC4', compact($user));
        return view('actFeed_____E', compact($user));
        return view('memberCommentF6', compact($user));
        
    }
}
