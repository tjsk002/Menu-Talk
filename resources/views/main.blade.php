
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="UTF-8" name="viewport" content="width=device-width"
          , initial-scale="1">
    <link rel="stylesheet" href="../assets/scss/bootstrap.scss">
    <link rel="stylesheet" href="../assets/scss/custom.scss">
  <title>php 게시판 웹 사이트</title>
</head>
<body>
<!-- test -->
@php
//String userID = null;
//if (session.getAttribute("userID") != null) {
//userID = (String) session.getAttribute("userID");
//}
@endphp
<nav class="navbar navbar-default">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed"
                data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"
                aria-expanded="false">
            <span class="icon-bar"></span> <span class="icon-bar"></span> <span
                    class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="main.jsp">php 게시판 웹 사이트</a>
    </div>

    <div class="collapse navbar-collapse"
         id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            <li class="active"><a href="main.jsp">메인</a></li>
            <li><a href="bbs.jsp">게시판</a></li>
        </ul>
        <?php
        //        if (userID == null) {
        ?>
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown"><a href="#" class="dropdown-toggle"
                                    data-toggle="dropdown" role="button" aria-haspopup="true"
                                    aria-expanded="flase">접속하기<span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="login.jsp">로그인</a></li>
                    <li><a href="join.jsp">회원가입</a></li>
                </ul></li>
        </ul>

    <?php
        } else {
        ?>
{{--@if()--}}
{{--        @else--}}
{{--    @elseif--}}
{{--        @endif--}}
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown"><a href="#" class="dropdown-toggle"
                                    data-toggle="dropdown" role="button" aria-haspopup="true"
                                    aria-expanded="flase">회원관리<span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="logoutAction.jsp">로그아웃</a></li>

                </ul>
            </li>
        </ul>
    <?php

        ?>
    </div>
</nav>
<div class="container">
    <div class="jumbotron">
        <div class="container">
            <h1>웹사이트 소개</h1>
            <p>이 웹 사이트는 부트스트랩으로 만든 php웹 사이트입니다. 최소한의 간단한 뢱만을 이용해서 개발했습니다.</p>
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
                <img src="images/img1.jpg">
            </div>
            <div class="item">
                <img src="images/img2.jpg">
            </div>
            <div class="item">
                <img src="images/img3.jpg">
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
</html>
