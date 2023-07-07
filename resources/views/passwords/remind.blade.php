
@extends('layouts.layout')
@section('content')
<form action="{{ route('remind.store') }}" method="POST" role="form" class="form__auth">
    {!! csrf_field() !!}
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">비밀번호 찾기/변경</div>
                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="#">
                                <label>
                                    비밀번호를 잊으셨나요? 메일을 통해 본인인증 후 비밀번호를 변경해주세요.
                                </label>
{{--                            <div class="form-group">--}}
{{--                                <label for="name" class="col-md-4 control-label">Name</label>--}}

{{--                                <div class="col-md-6">--}}
{{--                                    <input id="name" type="text" class="form-control" name="name" placeholder="이름"--}}
{{--                                           required>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <div class="form-group">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email"
                                           value="회원가입 할 때 사용한 이메일 주소"
                                           required autofocus>
                                </div>
                            </div>
                            <input type="submit" name="mail" class="btn btn-primary form-control"
                                   value="메일 전송으로 비밀번호 변경">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection