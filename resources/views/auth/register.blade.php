@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <form action="{{ route('auth.create')}}" method="post" class="container mb-5" enctype="multipart/form-data"> {{--與路由動作相同--}}
                    @csrf {{-- token --}}
                    <div class="results">
                        @if(Session::get('success'))
                        <div class="alert alert-success">{{ Session::get('success')}}</div>
                        @endif
                        @if(Session::get('fail'))
                        <div class="alert alert-danger">{{ Session::get('fail')}}</div>
                        @endif
                    </div>

                    <div class="row">
                        <div class="col-6 mx-auto my-5 text-center">
                            <h1 class="fw-bold">使用者註冊</h1>
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 mx-auto my-3">
                            <label class="input-group mb-3">
                                <span for="userEmail" class="input-group-text">註冊信箱</span>
                                <input type="email" class="form-control bg-light" id="userEmail" name="userEmail" value="{{ old('email')}}">
                                <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                            </label>
                            <label class="input-group mb-3">
                                <span for="userPassword" class="input-group-text">密碼</span>
                                <input type="password" class="form-control bg-light" id="userPassword" name="userPassword">
                                <span class="text-danger">@error('password'){{ $message }}@enderror</span>
                            </label>
                            <label class="input-group mb-3">
                                <span for="userPasswordCheck" class="input-group-text">再次確認密碼</span>
                                <input type="password" class="form-control bg-light" id="userPasswordCheck" name="userPasswordCheck">
                                <span class="text-danger">@error('password'){{ $message }}@enderror</span>
                            </label>
                            <label class="input-group mb-3">
                                <span for="userNickName" class="input-group-text">使用者名稱</span>
                                <input type="text" class="form-control bg-light" id="userNickName" name="userNickName" value="{{ old('name')}}">
                                <span class="text-danger">@error('name'){{ $message }}@enderror</span>
                            </label>
                            <label class="input-group mb-3">
                                <span for="userName" class="input-group-text">真實姓名</span>
                                <input type="text" class="form-control bg-light" id="userName" name="userName" value="{{ old('name')}}">
                                <span class="text-danger">@error('name'){{ $message }}@enderror</span>
                            </label>
                            <label class="input-group mb-3">
                                <span for="cityId" class="input-group-text">居住地區</span>
                                <select class="form-select" aria-label="cityId" name="cityId">
                                    <option selected>選擇地區...</option>
                                    <option value="1">基隆市</option>
                                    <option value="2">台北市</option>
                                    <option value="3">新北市</option>
                                    <option value="4">桃園市</option>
                                    <option value="5">新竹縣</option>
                                    <option value="6">新竹市</option>
                                    <option value="7">苗栗縣</option>
                                    <option value="8">台中市</option>
                                    <option value="9">彰化縣</option>
                                    <option value="10">南投縣</option>
                                    <option value="11">雲林縣</option>
                                    <option value="12">嘉義縣</option>
                                    <option value="13">嘉義市</option>
                                    <option value="14">台南市</option>
                                    <option value="15">高雄市</option>
                                    <option value="16">屏東縣</option>
                                    <option value="17">宜蘭縣</option>
                                    <option value="18">花蓮縣</option>
                                    <option value="19">台東縣</option>
                                    <option value="20">澎湖縣</option>
                                    <option value="21">金門縣</option>
                                    <option value="22">連江縣</option>
                                    <option value="23">其他</option>
                                </select>
                                {{-- @foreach ($cityList as $city)
                                <option class="form-select" aria-label="userCity" name="userCity" value="{{ $city->cityId }}" {{ ($user->cityId == $city->cityId) ? 'selected' : '' }}>{{ $city->city }}</option>
                                @endforeach --}}
                            </label>
                            <label class="input-group mb-3">
                                <span for="userGender" class="input-group-text">性別</span>
                                <select class="form-select" aria-label="userGender" name="userGender">
                                    <option selected>選擇性別...</option>
                                    <option value="M">男性</option>
                                    <option value="F">女性</option>
                                    <option value="N">多元性別</option>
                                </select>
                            </label>
                            <label class="input-group mb-3">
                                <span for="userBirthday" class="input-group-text">生日</span>
                                <input type="date" class="form-control bg-light" id="userBirthday" name="userBirthday">
                            </label>
                            <div class="mb-3">
                                <label for="notice" class="form-label">注意事項</label>
                                <section type="text" class="form-control bg-light overflow-auto" id="notice">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Blandit a hendrerit donec lacus ut quis bibendum nulla et. Lacus ultrices imperdiet enim in ac amet magna vestibulum. Ut tempor vel porttitor lacinia cursus.
                                        Hendrerit convallis nibh tempor porttitor platea magna maecenas eget. Pulvinar ut id elit, maecenas convallis morbi. Nisl velit eget non sit ac purus. Leo pulvinar at et, feugiat ornare. 
                                        Est porttitor duis vel venenatis diam, malesuada cursus morbi. Diam amet a, justo vel at. Nunc lorem tristique nisl arcu. Cras turpis tortor.
                                    </p>
                                </section>
                            </div>
                            <div class="form-check d-flex flex-row-reverse mb-5">
                                <label class="form-check-label" for="noticeCheck">
                                    <input type="hidden" class="form-check-input" id="noticeCheck" name="noticeCheck" value="0"> {{--預設未勾選為0--}}
                                    <input type="checkbox" class="form-check-input" id="noticeCheck" name="noticeCheck" value="1">
                                    我已閱讀以上注意事項
                                </label>
                            </div>
                            <div class="container d-flex justify-content-around">
                                <a href="login" class="btn btn-outline-primary" type="submit" value="login">我已有帳號</a>
                                <button class="btn btn-primary link-light" type="submit">確認註冊</button>
                            </div>
                        </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection