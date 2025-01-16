@extends('layouts.layout')
@section('content')
    <div class="container">
        <div class="col-lg-4"></div>
        <div class="col-lg-4">
            <div class="jumbotron" style="padding-top: 20px;">
                <form method="post"
{{--                      action="{{route('sessions.store')}}"--}}
                >
                    {!! csrf_field() !!}
                    <h3 style="text-align: center;">로그인 화면</h3>
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="이메일"
                               name="email" maxlength="20" value="{{old('email')}}">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="비밀번호"
                               name="password" maxlength="20" value="{{old('password')}}">
                    </div>
{{--                    <div class="form-group">--}}
{{--                        <div class="checkbox">--}}
{{--                            <label>--}}
{{--                                <input type="checkbox" name="remember" value="{{old('remember',1)}}" checked>--}}
{{--                                로그인 기억하기<br>--}}
{{--                                <span class="text-danger">(주의 공용 컴퓨터에서는 사용하지 마세요.)</span>--}}
{{--                            </label>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <input type="submit" name="login" class="btn btn-primary form-control"
                           value="로그인">
                    <div class="form-group">
                        <p class="text-center login-text">
{{--                            회원이 아니라면?<br>--}}
{{--                            <a href="{{route('users.create')}}">회원가입하러가기</a>--}}
                            <br>
                            <a href="{{route('remind.create')}}">
                                비밀번호를 잊으셨나요?
                            </a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-4"></div>
    </div>
    <style>
        .login-text {
            margin-top: 50px;
        }
        .login-text a {
            font-size: 15px;
        }
    </style>
@endsection