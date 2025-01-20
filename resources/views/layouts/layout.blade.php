{{-- **** 사용 layout--}}

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="UTF-8" name="viewport" content="width=device-width" , initial-scale="1">
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-theme.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-theme.min.css')}}">
    <link href="{{mix('css/app.css')}}" rel="stylesheet">
    @yield('headerTitle')
    <style type="text/css">
        a, a:hover {
            color: #000000;
            textdecoration: none;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-default">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed"
                data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"
                aria-expanded="false">
            <span class="icon-bar"></span> <span class="icon-bar"></span> <span
                    class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{route('home2')}}">Menu Talk</a>
    </div>

    <div class="collapse navbar-collapse"
         id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
{{--            <li><a href="/contact-form">문의하기</a></li>--}}
{{--            <li><a href="{{route('index')}}">게시판</a></li>--}}
            <li>
                <a href="#" id="button1">문의하기
{{--                    <button id="button1">스크롤</button>--}}
                </a>
            </li>
        </ul>

        @if(auth()->user())
            <div class="dropdown">
                <span class="drop-btn"><strong>{{auth()->user()->getName()}}</strong>님</span>
                <div class="dropdown-content">
                    <a href="/auth/profile">내 정보</a>
                    <a href="/auth/logout">로그아웃</a>
                    <a href="#">비밀번호 변경</a>
                </div>
            </div>
        @else
        <div class="guest-form">
            <a href="/auth/login">로그인</a>
            <a href="/auth/join">회원가입</a>
        </div>
        @endif
    </div>
</nav>

{{--@include('flash::message')--}}
<nav>
    @if(session()->has('flash_message'))
        <div class="alert alert-info" role="alert">
            {{session('flash_message')}}
        </div>
    @endif
</nav>
@php
@endphp
{{--@include('manage.invoice_modal', ['user_id', $userId]);--}}
@include('manage.invoice_modal')
@yield('content')
<style>
    .dropdown{
        cursor: pointer;
        position : relative;
        display : inline-block;
        width: 150px;
        text-align: center;
        line-height: 50px;
        float: right;
    }

    .dropdown-content{
        display : none;
        position : absolute;
        z-index : 1; /*다른 요소들보다 앞에 배치*/
    }

    .dropdown-content a{
        width: 150px;
        display : block;
        line-height: 40px;
        background-color: #ffffff;
    }

    .dropdown:hover .dropdown-content {
        display: block;
    }

    .guest-form {
        display: inline-block;
        line-height: 50px;
        float: right;
    }

    .guest-form a {
        color: #777;
        padding: 10px 15px;
    }
</style>
<script>
    const button1 = document.getElementById('button1');
    const section1 = document.getElementById('section1');

    button1.addEventListener('click', () => {
        window.scrollBy({top: section1.getBoundingClientRect().top, behavior: 'smooth'});
    });
</script>
<script src="http://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="/js/bootstrap.js"></script>
<script src="{{mix('js/app.js')}}"></script>
</body>
</html>
