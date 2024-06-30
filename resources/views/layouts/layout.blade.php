{{-- **** 사용 layout--}}

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="UTF-8" name="viewport" content="width=device-width" , initial-scale="1">
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-theme.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-theme.min.css')}}">
    <link href="{{elixir('css/app.css')}}" rel="stylesheet">
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
            <li>
                <a href="#" id="button1">스크롤
{{--                    <button id="button1">스크롤</button>--}}
                </a>
            </li>
        </ul>
        @if(auth()->guest())
        <ul class="nav navbar-nav navbar-right">
{{--            <li class="dropdown"><a href="#" class="dropdown-toggle"--}}
{{--                                    data-toggle="dropdown" role="button" aria-haspopup="true"--}}
{{--                                    aria-expanded="false">접속하기<span class="caret"></span></a>--}}
{{--                <ul class="dropdown-menu">--}}
                    <li><a href="{{route('sessions.store')}}">로그인</a></li>
                    <li><a href="{{route('users.store')}}">회원가입</a></li>
{{--                </ul>--}}
            </li>
        </ul>
        @elseif(auth()->user())
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown"><a href="#" class="dropdown-toggle"
                                    data-toggle="dropdown" role="button" aria-haspopup="true"
                                    aria-expanded="false">회원관리<span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="#">개인정보 변경</a></li>
                    <li><a href="{{route('remind.store')}}">비밀번호 변경</a></li>
                    <li><a href="{{route('sessions.destroy')}}"><strong>{{auth()->user()->name}}</strong>님 로그아웃</a></li>
                </ul>
            </li>
        </ul>
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
@yield('content')

<script>
    const button1 = document.getElementById('button1');
    const section1 = document.getElementById('section1');

    button1.addEventListener('click', () => {
        window.scrollBy({top: section1.getBoundingClientRect().top, behavior: 'smooth'});
    });
</script>
<script src="http://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="/js/bootstrap.js"></script>
<script src="{{elixir('js/app.js')}}"></script>
</body>
</html>
