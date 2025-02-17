@extends('layouts.layout')
@section('headerTitle')
    <title>내 메뉴 관리</title>
@endsection
@section('content')
    <div class="container">
        <div class="col-lg-8"></div>
        <div class="col-lg-8">
            <div class="jumbotron" style="padding-top: 20px; text-align: center;">
                <h3 style="text-align: center;">내 메뉴 관리</h3>
                <div class="form-group">
                    <div>메뉴 총 개수 : 10</div>
                    <div class="menu-one-box">
                        <div class="menu-img-box">
                            <img src="http://imagefarm.baemin.com/smartmenuimage/upload/image/2022/7/1/48DzcIZeKrlIF7w0WNA6L1RSUYCg8Jsxbq2p1vd8eyut5SL7uQlG4uno18HqrYbUST9HQxV08DPPd759TYydDQ==.jpg">
                        </div>
                        <div class="text-box">
                            <span>대한민국 대표 마라탕(1인분)</span><br>
                            <span>먹어도먹어도 질리지않는 불가사의한 맛</span><br>
                            <span>9,900</span>
                        </div>
                    </div>
                    <div class="menu-one-box">
                        <div class="menu-img-box">
                            <img src="http://imagefarm.baemin.com/smartmenuimage/image_library/20210422/r_6.jpg">
                        </div>
                        <div class="text-box">
                            <span>펩시콜라(355ml)</span><br>
                            <span>펩시콜라(355ml)</span><br>
                            <span>2,000</span>
                        </div>
                    </div>
                    <div class="menu-one-box">
                        <div class="menu-img-box"></div>
                        <div class="text-box">
                            <span>메뉴 제목</span><br>
                            <span>먹어도먹어도 질리지않는 불가사의한 맛</span><br>
                            <span>19,000</span>
                        </div>
                    </div>
                </div>
                <button id="newMenuPage" class="btn btn-primary form-control" onclick="location.href='/auth/new-menu'">
                    새 메뉴 추가
                </button>
            </div>
        </div>
    </div>
    <style>
        .menu-one-box {
            width: 250px;
            display: inline-block;
        }
        .menu-img-box {
            margin-top: 20px;
            background-color: #dfdfdf;
            display: inline-block;
        }
        .menu-img-box img {
            width: 250px;
        }
        .text-box {
            margin-top: 20px;
        }
        .text-box span:first-child {
            font-weight: bold;
            font-size: 16px;
        }
        #newMenuPage {
            width: 50%;
            margin-top: 50px;
        }

    </style>
    <script>

    </script>
@endsection