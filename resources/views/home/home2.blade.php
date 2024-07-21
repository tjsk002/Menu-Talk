@extends('layouts.layout')

@section('content')
    @parent
    <div class="container">
        <div class="jumbotron">
            <div class="container" style="display: inline-block">
                <h1 style="font-weight: bold">Menu-Talk</h1>
                <p style="font-weight: bold">테블릿 메뉴판</p>
                <p style="font-weight: bold; font-size: 40px;">구매하지 말고<br>
                    <span style="color: #E84429">부담 ZERO</span> 렌탈 시작하세요
                </p>
                <button style="background-color: #212121; color: #fff; border-radius: 12px; padding: 12px 24px">렌탈 1위 메뉴톡과 상담</button>
{{--                <p class="text-center"><a class="btn btn-primary btn-pull" href="{{route('index')}}" role="button">자세히 알아보기</a></p>--}}
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
                <h3>
                    메뉴잇은 어떤 특별한 혜택을 제공할까요?
                </h3>
                <div>
                    평생 무료 A/S 서비스를 드려요
                    <p>사용한지 3년이 지났는데 이상 무상수리 안된대요.
                    기기가 제 소유인데도 소프트웨어 비용은 지불해야 한대요.
                        이럴거면 그냥 렌탈했죠!
                    </p>
                </div>
                {{--                    <p class="text-center"><a class="btn btn-primary btn-pull" href="#" role="button">자세히 알아보기</a></p>--}}
            </div>
        </div>
    </div>
    <div class="container">
        <div class="jumbotron">
            <div class="container">
                <h1>테이블 오더의 최종 진화</h1>
                <p>
                    메뉴 톡 오더패드
                    <span>지금부터는 무선입니다.</span>
                </p>
                <p class="text-center"><a class="btn btn-primary btn-pull" href="#" role="button">자세히 알아보기</a></p>
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


