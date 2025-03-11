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
                    <div>메뉴 총 개수 : {{$count}}</div>
                    @foreach($menu as $item)
                    <div class="menu-one-box">
                        <div class="text-box">
                            <div class="menu-img-box">
                                @if($item->getImgUrl())
                                    <img src={{$item->getImgUrl()}}>
                                @else
                                    <img src="https://img.freepik.com/premium-vector/no-photo-available-vector-icon-default-image-symbol-picture-coming-soon-web-site-mobile-app_87543-18055.jpg">
{{--                                    <div class="empty-img-box"></div>--}}
                                @endif
                            </div>
                            <span><{{$item->getCategory()}}></span><br>
                            <span class="first-span">{{$item->getTitle()}}</span><br>
                            <span>{{$item->getSubTitle()}}</span><br>
                            <span>{{$item->getPrice()}}</span>
                        </div>
                    </div>
                    @endforeach
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
            margin: 20px 0;
            background-color: #dfdfdf;
            display: inline-block;
        }
        .menu-img-box img {
            width: 250px;
            height: 200px;
        }
        .text-box {
            margin-top: 20px;
        }
        .text-box .first-span {
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