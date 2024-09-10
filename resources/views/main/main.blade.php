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
                    <p style="font-size: 16px;">사용한지 3년이 지났는데 이상 무상수리 안된대요.<br>
                        기기가 제 소유인데도 소프트웨어 비용은 지불해야 한대요.<br>
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
                <h2>테이블 오더의 최종 진화</h2>
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
                    <h2>새로 바꿈 케어</h2>
                    <p>
                        자동차 보험만 중요할까요?<br>
                        테이블오더 렌탈 서비스를 기반으로 한 업계 유일 보험 시스템입니다.<br>
                        0원
                    </p>
                    <p>
                        <span class="content-title">파손된 기기를 새로 무상 교체</span><br>
                        <span class="content-description">업주님 및 손님의 과실로 기기가 파손되면 새로 교체해드립니다.</span><br><br>
                        <span class="content-title">기기 오작동 시 새로 무상 교체</span><br>
                        <span class="content-description">화면 터치 미작동 등 기능적인 문제가</span><br>
                        <span class="content-description">발생하면 새로 교체해 드립니다.</span><br><br>
                        <span class="content-title">침수 기기를 새로 무상 교체</span><br>
                        <span class="content-description">기기 내부에 액체류 (ex. 물, 국물, 주류)가</span><br>
                        <span class="content-description">들어가 고장나도 새로 교체해 드립니다.</span><br>
                    </p>
{{--                    <p class="text-center"><a class="btn btn-primary btn-pull" href="#" role="button">자세히 알아보기</a></p>--}}
                </div>
            </div>
        </div>
    </div>
@endsection

<style>
    .content-title {
        font-size: 16px;
        font-weight: bold;
    }
    .content-description {
        font-size: 14px;
    }
</style>
