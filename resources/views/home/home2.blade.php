@extends('layouts.layout')

@section('content')
    @parent
    <div class="container">
        <div class="jumbotron">
            <div class="container">
                <h1>웹사이트 소개</h1>
                <p>이 웹 사이트는 부트스트랩으로 만든 php웹 사이트입니다. 최소한의 간단한 기능을 이용해서 개발했습니다.</p>
                <p class="text-center"><a class="btn btn-primary btn-pull" href="{{route('index')}}" role="button">자세히 알아보기</a></p>
            </div>
        </div>
    </div>
{{--    <div class="container">--}}
{{--        <div id="myCarousel" class="carousel slide" data-ride="carousel">--}}
{{--            <ol class="carousel-indicators">--}}
{{--                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>--}}
{{--                <li data-target="#myCarousel" data-slide-to="1"></li>--}}
{{--                <li data-target="#myCarousel" data-slide-to="2"></li>--}}
{{--            </ol>--}}
            <!-- 스틸컷 이미지 삽입 -->
{{--            <div class="carousel-inner" style="width: 800px; height: 500px" >--}}
{{--                <div class="item active" >--}}
{{--                                    <img src="images/img1.jpg" style="width: 100%">--}}
{{--                </div>--}}
{{--                <div class="item">--}}
{{--                                    <img src="images/img2.jpg" style="width: 100%">--}}
{{--                </div>--}}
{{--                <div class="item">--}}
{{--                                    <img src="images/img3.jpg" style="width: 100%">--}}
{{--                </div>--}}
{{--            </div>--}}

            <!-- 스틸컷 넘기는 버튼 -->
{{--            <a class="left carousel-control" href="#myCarousel" data-slide="prev">--}}
{{--                <span class="glyphicon glyphicon-chevron-left"></span>--}}
{{--            </a>--}}
{{--            <a class="right carousel-control" href="#myCarousel" data-slide="prev">--}}
{{--                <span class="glyphicon glyphicon-chevron-right"></span>--}}
{{--            </a>--}}
{{--        </div>--}}
    <div class="container">
        <div class="jumbotron">
            <div class="container">
                <h1>.</h1>
                {{--                    <p class="text-center"><a class="btn btn-primary btn-pull" href="#" role="button">자세히 알아보기</a></p>--}}
            </div>
        </div>
    </div>
    <div class="container">
        <div class="jumbotron">
            <div class="container">
                <h1>.</h1>
                {{--                    <p class="text-center"><a class="btn btn-primary btn-pull" href="#" role="button">자세히 알아보기</a></p>--}}
            </div>
        </div>
    </div>
    <div class="container" id="section1">
            <div class="jumbotron">
                <div class="container">
                    <h1>스크롤 테스트</h1>
                    <p>상단의 '스크롤'을 클릭했을 시 이동하는 이벤트입니다.</p>
{{--                    <p class="text-center"><a class="btn btn-primary btn-pull" href="#" role="button">자세히 알아보기</a></p>--}}
                </div>
            </div>
        </div>
    </div>
@endsection


