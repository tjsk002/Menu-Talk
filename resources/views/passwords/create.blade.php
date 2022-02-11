@extends('layouts.layout')
@section('content')
    <style>
        .loginText a {
            font-size: 15px;
        }
    </style>
    <div class="container">
        <div class="col-lg-4"></div>
        <div class="col-lg-4">
            <div class="jumbotron" style="padding-top: 20px;">
                <form method="post" action="#">
{{--                    {!! csrf_field() !!}--}}

                    <h3 style="text-align: center;">비밀번호 찾기</h3>
                </form>
            </div>
        </div>
        <div class="col-lg-4"></div>
    </div>
@endsection