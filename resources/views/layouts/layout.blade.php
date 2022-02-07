<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="UTF-8" name="viewport" content="width=device-width" , initial-scale="1">
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-theme.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-theme.min.css')}}">

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
        <a class="navbar-brand" href="{{route('home2')}}">php 게시판 웹 사이트</a>
    </div>

    <div class="collapse navbar-collapse"
         id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            <li><a href="{{route('home2')}}">메인</a></li>
            <li><a href="{{route('index')}}">게시판</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown"><a href="#" class="dropdown-toggle"
                                    data-toggle="dropdown" role="button" aria-haspopup="true"
                                    aria-expanded="false">접속하기<span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="{{route('login')}}">로그인</a></li>
                    <li><a href="{{route('join')}}">회원가입</a></li>
                </ul>
            </li>
        </ul>

        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown"><a href="#" class="dropdown-toggle"
                                    data-toggle="dropdown" role="button" aria-haspopup="true"
                                    aria-expanded="flase">회원관리<span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="#">로그아웃</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>

@yield('content')

<script src="http://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="/js/bootstrap.js"></script>

</body>
</html>
