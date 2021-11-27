@extends('layouts.app')

@section('content')
<div class="container" style="margin-bottom: 6.35rem;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <form action="{{ route('auth.check')}}" method="post" class="container mb-5">
                @csrf
                <div class="results">
                    @if(Session::get('fail'))
                    <div class="alert alert-danger">{{ Session::get('fail')}}</div>
                    @endif
                </div>
                    <div class="col-6 mx-auto my-5 text-center">
                        <h1 class="fw-bold">歡迎登入</h1>
                        <hr>
                    </div>
                    <div class="row">
                        <div class="col-6 mx-auto my-3">
                            <div class="input-group mb-3">
                                <span for="userEmail" class="input-group-text">註冊信箱</span>
                                <input type="email" class="form-control bg-light" id="userEmail" name="userEmail" value="{{ old('email') }}">
                                <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                            </div>
                            <div class="input-group mb-3">
                                <span for="userPassword" class="input-group-text">密碼</span>
                                <input type="password" class="form-control bg-light" id="userPassword" name="userPassword">
                                <span class="text-danger">@error('password'){{ $message }}@enderror</span>
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="rememberAccount" name="rememberAccount">
                                <input type="hidden" class="form-check-input" id="noticeCheck" name="noticeCheck" value="0">
                                <label class="form-check-label" for="rememberAccount" value="1">記住帳號</label> 
                            </div>
                            <div class="mb-5">
                                <a href="{{----}}" id="resetPassword" class="form-text">忘記密碼</a>
                            </div>
                            <div class="container d-flex justify-content-around">
                                <a href="register" class="btn btn-outline-primary" type="submit" value="register">註冊</a>
                                <button class="btn btn-primary link-light" type="submit" value="login">登入</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection