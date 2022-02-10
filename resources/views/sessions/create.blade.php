@extends('layouts.layout')
@section('content')
    <style>
        .loginText a {
            font-size: 15px;
        }
    </style>
    <div class="container">
        <div class="col-lg-4"></div>
        <div class="col-lg-4">
            <div class="jumbotron" style="padding-top: 20px;">
                <form method="post" action="{{route('sessions.store')}}">
                    {!! csrf_field() !!}

                    <h3 style="text-align: center;">로그인 화면</h3>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="이메일"
                               name="email" maxlength="20" value="{{old('email')}}">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="비밀번호"
                               name="password" maxlength="20" value="{{old('password')}}">
                    </div>
                    <input type="submit" name="login" class="btn btn-primary form-control"
                           value="로그인">

                    <div class="form-group">
                        <p class="text-center loginText">
                            회원이 아니라면?
                                <a href="{{route('users.create')}}">회원가입하러가기</a>
                        </p>
                        <p class="text-center loginText">
                            <a href="#">
                                비밀번호를 잊으셨나요?
                            </a>
                        </p>
                    </div>

                </form>
            </div>
        </div>
        <div class="col-lg-4"></div>
    </div>
@endsection