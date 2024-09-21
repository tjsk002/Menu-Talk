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
                    <li><a href="">
                            @php
                                $userId = 11;
                            @endphp
                            문의하기
{{--                            <button type="button" class="btn btn-link btn-sm" data-bs-toggle="modal"--}}
{{--                                    data-bs-target="#invoiceModal{{$userId}}">--}}
                            <button type="button" class="btn btn-link btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#invoiceModal">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                 fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                            </svg>
                            </button>
                        </a></li>
                    <li><a href="{{route('sessions.store')}}">로그인</a></li>
{{--                    <li><a href="{{route('manage.auth.login')}}">로그인</a></li>--}}
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
{{--                    <li><a href="{{route('sessions.destroy')}}"><strong>{{auth()->user()->name}}</strong>님 로그아웃</a></li>--}}
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
@php
@endphp
{{--@include('manage.invoice_modal', ['user_id', $userId]);--}}
@include('manage.invoice_modal')
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
<script src="{{mix('js/app.js')}}"></script>
</body>
</html>
