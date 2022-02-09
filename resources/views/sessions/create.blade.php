
@extends('layouts.layout')

@section('headerTitle')
    <title>회원가입</title>
@endsection

@section('content')
    <div class="container">
        <div class="col-lg-4"></div>
        <div class="col-lg-4">
            <div class="jumbotron" style="padding-top: 20px;">
                <form method="post" action="{{route('users.store')}}">
{{--                                    csrf_field 함수는 CSRF 토큰 값을 포함하는 HTML hidden Input 필드를 생성--}}
{{--                    {!! csrf_field() !!}--}}
                    <h3 style="text-align: center;">회원가입 화면</h3>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="아이디"
                                               name="userID" maxlength="20">
                                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="이름"
                               name="userName" maxlength="20" value="{{old('name')}}">
{{--                                            old 함수는 세션에 저장된 이전 입력값(flashed)을 조회--}}
{{--                        {!! $error->first('name','<span class="form-error">:message</span>') !!}--}}

                        @if ($errors->has('name'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <input type="password" class="form-control" placeholder="비밀번호"
                               name="userPassword" maxlength="20" value="{{old('password')}}">
                        @if ($errors->has('password'))
                            <span class="help-block">
                                                            <strong>{{ $errors->first('password') }}</strong>
                                                        </span>
                        @endif
                    </div>

{{--                    <div class="form-group" style="text-align:center;">--}}
{{--                        <div class="btn-group" data-toggle="buttons">--}}

{{--                            <label class="btn btn-primary active">--}}
{{--                                <input type="radio" name="userGender" autocomplete="off" value="남자" checked/>남자--}}
{{--                            </label>--}}
{{--                            <label class="btn btn-primary">--}}
{{--                                <input type="radio" name="userGender" autocomplete="off" value="여자" checked/>여자--}}
{{--                            </label>--}}
{{--                        </div>--}}

{{--                    </div>--}}

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <input type="email" class="form-control" placeholder="이메일"
                               name="userEmail" maxlength="20" value="{{old('email')}}">
                        @if ($errors->has('email'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <input type="submit" class="btn btn-primary form-control"
                           value="회원가입">
                </form>
            </div>
        </div>
        <div class="col-lg-4"></div>
    </div>
@endsection