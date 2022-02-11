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
                <form method="post" action="{{route('remind.store')}}" role="form">
                                        {!! csrf_field() !!}

                    <h3 style="text-align: center;">비밀번호 찾기</h3>
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="{{trans('auth.form.email')}}" value="{{old('email')}}" autofocus>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-4"></div>
    </div>
@endsection