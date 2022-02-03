<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="UTF-8" name="viewport" content="width=device-width"
          , initial-scale="1">
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-theme.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-theme.min.css')}}">

{{--    <link rel="stylesheet" href="{{asset('css/custom.css')}}">--}}

<!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <style>
        /*@import url(http://fonts.googleapis.com/earlyaccess/nanumgothic.css);*/
        /*@import url(http://fonts.googleapis.com/earlyaccess/hanna.css);*/

        * {
            font-family: 'Nanum Gothic';
        }

        h1 {
            font-family: 'Hanna';
        }

    </style>
    <title>php 게시판 웹 사이트</title>
</head>
<body>

{{--<nav class="navbar navbar-default">--}}
{{--    <div class="navbar-header">--}}
{{--        <button type="button" class="navbar-toggle collapsed"--}}
{{--                data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"--}}
{{--                aria-expanded="false">--}}
{{--            <span class="icon-bar"></span> <span class="icon-bar"></span> <span--}}
{{--                    class="icon-bar"></span>--}}
{{--        </button>--}}
{{--        <a class="navbar-brand" href="#">php 게시판 웹 사이트</a>--}}
{{--    </div>--}}

{{--    <div class="collapse navbar-collapse"--}}
{{--         id="bs-example-navbar-collapse-1">--}}
{{--        <ul class="nav navbar-nav">--}}
{{--            <li class="active"><a href="/">메인 {{$name}}</a></li>--}}
{{--            <li><a href="{{route('board')}}">게시판</a></li>--}}
{{--        </ul>--}}

{{--        <ul class="nav navbar-nav navbar-right">--}}
{{--            <li class="dropdown"><a href="#" class="dropdown-toggle"--}}
{{--                                    data-toggle="dropdown" role="button" aria-haspopup="true"--}}
{{--                                    aria-expanded="flase">접속하기<span class="caret"></span></a>--}}
{{--                <ul class="dropdown-menu">--}}
{{--                    <li><a href="#">로그인</a></li>--}}
{{--                    <li><a href="{{route('join')}}">회원가입</a></li>--}}
{{--                </ul></li>--}}
{{--        </ul>--}}

{{--        <ul class="nav navbar-nav navbar-right">--}}
{{--            <li class="dropdown"><a href="#" class="dropdown-toggle"--}}
{{--                                    data-toggle="dropdown" role="button" aria-haspopup="true"--}}
{{--                                    aria-expanded="flase">회원관리<span class="caret"></span></a>--}}
{{--                <ul class="dropdown-menu">--}}
{{--                    <li><a href="logoutAction.jsp">로그아웃</a></li>--}}
{{--                </ul>--}}
{{--            </li>--}}
{{--        </ul>--}}
{{--    </div>--}}
{{--</nav>--}}
@yield('content')
@yield('script')
<div class="container">
    <div class="jumbotron">
        <div class="container">
            <h1>웹사이트 소개</h1>
            <p>이 웹 사이트는 부트스트랩으로 만든 php웹 사이트입니다. 최소한의 간단한 기능만을 이용해서 개발했습니다.</p>
            <p class="text-center"><a class="btn btn-primary btn-pull" href="#" role="button">자세히 알아보기</a></p>
        </div>
    </div>
</div>
<div class="container">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <!-- 스틸컷 이미지 삽입 -->
        <div class="carousel-inner">
            <div class="item active">
                {{--                <img src="{{asset('images/img1.jpg')}}" alt="색상있는 공 이미지">--}}
            </div>
            <div class="item">
                {{--                <img src="{{asset('images/img2.jpg')}}" alt="물감 이미지">--}}
            </div>
            <div class="item">
                {{--                <img src="{{asset('images/img3.jpg')}}" alt="색연필 이미지">--}}
            </div>
        </div>
        <!-- 스틸컷 넘기는 버튼 -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
    </div>
</div>
</body>
<footer>
    {{--    @extends('layouts.master')--}}
    {{--    @section('content')--}}
    {{--        <p>저는 자식 뷰의 content 입니다.</p>--}}
    {{--    @endsection--}}

    {{--    @section('script')--}}
    {{--        <script>--}}
    {{--            alert('ddd');--}}
    {{--        </script>--}}
    {{--    @endsection--}}
</footer>
</html>
