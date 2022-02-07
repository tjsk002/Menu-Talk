@extends('layouts.layout')
@section('content')

<div class="container">
    <div class="col-lg-4"></div>
    <div class="col-lg-4">
        <div class="jumbotron" style="padding-top: 20px;">
            <form method="post" action="#">
                <h3 style="text-align: center;">로그인 화면</h3>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="아이디"
                           name="userID" maxlength="20">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="비밀번호"
                           name="userPassword" maxlength="20">
                </div>
                <input type="submit" class="btn btn-primary form-control"
                       value="로그인">
            </form>
        </div>
    </div>
    <div class="col-lg-4"></div>
</div>
@endsection