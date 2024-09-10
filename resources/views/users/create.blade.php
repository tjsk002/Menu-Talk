@extends('layouts.layout')
@section('headerTitle')
    <title>회원가입</title>
@endsection
@section('content')

{{--    <!DOCTYPE html>--}}
{{--    <html lang="ko">--}}
{{--    <head>--}}
{{--        <meta charset="UTF-8">--}}
{{--        <meta name="viewport" content="width=device-width, initial-scale=1.0">--}}
{{--        <title>체크박스 전체 선택</title>--}}
{{--        <style>--}}
{{--            label {--}}
{{--                display: block;--}}
{{--                margin-bottom: 10px;--}}
{{--            }--}}
{{--        </style>--}}
{{--    </head>--}}
{{--    <body>--}}
{{--    <label>--}}
{{--        <input type="checkbox" class="checkbox"> 항목 1--}}
{{--    </label>--}}
{{--    <label>--}}
{{--        <input type="checkbox" class="checkbox"> 항목 2--}}
{{--    </label>--}}
{{--    <label>--}}
{{--        <input type="checkbox" class="checkbox"> 항목 3--}}
{{--    </label>--}}
{{--    <label>--}}
{{--        <input type="checkbox" class="checkbox"> 항목 4--}}
{{--    </label>--}}
{{--    <label>--}}
{{--        <input type="checkbox" class="checkbox"> 항목 5--}}
{{--    </label>--}}
{{--        <button id="toggleAll">모두 선택/해제</button>--}}
{{--    </body>--}}
{{--    </html>--}}

    <div class="container">
        <div class="col-lg-4"></div>
        <div class="col-lg-4">
            <div class="jumbotron" style="padding-top: 20px;">
                <form method="post" action="{{route('users.store')}}">
                    {!! csrf_field() !!}
                    <h3 style="text-align: center;">회원가입</h3>
                    {{--사용자 관련정보--}}
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="이름"
                               name="name" maxlength="20" value="{{old('name')}}">
                        <input type="email" class="form-control" placeholder="이메일"
                               name="email" maxlength="50" value="{{old('email')}}">
                        <input type="text" class="form-control" placeholder="핸드폰 번호"
                               name="phone_number" maxlength="50" value="{{old('phone_number')}}">
                        <input type="password" class="form-control" placeholder="비밀번호"
                               name="password" maxlength="50" value="{{old('password')}}">
                        <input type="password" class="form-control" placeholder="비밀번호 확인"
                               name="password_confirmation" maxlength="50" value="{{old('password_confirmation')}}">
                    </div>
                    {{--회사정보--}}
                    <div class="form-group" style="margin-top: 40px;">
                        <input type="text" class="form-control" placeholder="회사 이름"
                               name="company_name" maxlength="50" value="{{old('company_name')}}">
                        <input type="text" class="form-control" placeholder="사업자 번호"
                               name="company_name" maxlength="50" value="{{old('business_number')}}">
                        <input type="text" class="form-control" placeholder="회사 연락처"
                               name="company_number" maxlength="50" value="{{old('company_number')}}">
                    </div>
                    <div>
                        <div id="toggleAll">
{{--                            <input type="checkbox" class="checkbox" required="required">--}}
                            <span>모두 동의합니다.</span>
                        </div>
                        <label><br>
                            <input type="checkbox" class="checkbox" required="required"> 만 14세 이상입니다.
                        </label>
                        <label><br>
                            <input type="checkbox" class="checkbox" required="required"> [필수] 이용약관
                        </label>
                        <label><br>
                            <input type="checkbox" class="checkbox" required="required"> [필수] 개인정보 수집 및 이용 동의
                        </label>
                    </div>
                    <input type="submit" class="btn btn-primary form-control" name="join" value="회원가입">
                </form>

            </div>
        </div>
        <div class="col-lg-4"></div>
    </div>
    <style>
        label {
            display: block;
        }
        .form-control {
            margin: 20px 0;
        }
        #toggleAll {
            cursor: pointer;
        }
    </style>
    <script>
        document.getElementById('toggleAll').addEventListener('click', function() {
            const checkboxes = document.querySelectorAll('.checkbox');
            const allChecked = Array.from(checkboxes).every(checkbox => checkbox.checked);

            checkboxes.forEach(checkbox => {
                checkbox.checked = !allChecked;
            });
        });
    </script>
@endsection