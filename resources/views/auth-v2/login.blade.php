@extends('layouts.layout')
@section('headerTitle')
    <title>로그인</title>
@endsection
@section('content')
    <div class="container">
        <div class="col-lg-4"></div>
        <div class="col-lg-4">
            <div class="jumbotron" style="padding-top: 20px;">
                <h3 style="text-align: center;">로그인 화면</h3>
                {!! csrf_field() !!}
                <div class="form-group">
                    <input id="email" type="email" class="form-control" placeholder="이메일"
                           name="email" maxlength="20" value="{{old('email')}}">
                    <input id="password" type="password" class="form-control" placeholder="비밀번호"
                           name="password" maxlength="20" value="{{old('password')}}">
                </div>
                <button id="loginBtn" class="btn btn-primary form-control">로그인</button>
                <div class="form-group">
                    <p class="text-center login-text">
                        <a href="/auth/join">회원가입 하러가기</a>
                        <br>
                        <a href="{{route('remind.create')}}">
                            비밀번호를 잊으셨나요?
                        </a>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-4"></div>
    </div>
    <style>
        .login-text {
            margin-top: 50px;
        }

        .login-text a {
            font-size: 15px;
        }

        .form-control {
            margin: 20px 0;
        }
    </style>
    <script>
        document.getElementById('loginBtn').addEventListener('click', function (event) {
            event.preventDefault();

            // 폼 데이터 수집
            const formData = {
                email: document.getElementById('email').value,
                password: document.getElementById('password').value,
            };

            axios.post('/auth/login', formData)
                .then(function (response) {
                    alert(response);
                })
                .catch(function (error) {
                    if (error.response.status !== 200) {
                        const errors = error.response.data.errors;
                        alert(errors);
                        // alert('로그인 시 오류가 발생했습니다. \n' + errors.join('\n'));
                    }
                });
        });
    </script>
@endsection