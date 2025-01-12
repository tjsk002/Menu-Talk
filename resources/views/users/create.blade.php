@extends('layouts.layout')
@section('headerTitle')
    <title>회원가입</title>
@endsection
@section('content')
<div class="container">
    <div class="col-lg-4"></div>
    <div class="col-lg-4">
        <div class="jumbotron" style="padding-top: 20px;">
            <h3 style="text-align: center;">회원가입</h3>
            {{-- 사용자 관련정보 --}}
            <div class="form-group">
                <input type="text" id="name" class="form-control" placeholder="이름" maxlength="20">
                <input type="email" id="email" class="form-control" placeholder="이메일" maxlength="50">
                <input type="text" id="phone_number" class="form-control" placeholder="핸드폰 번호" maxlength="50">
                <input type="password" id="password" class="form-control" placeholder="비밀번호" maxlength="50">
                <input type="password" id="password_confirmation" class="form-control" placeholder="비밀번호 확인" maxlength="50">
            </div>
            {{-- 회사정보 --}}
            <div class="form-group" style="margin-top: 40px;">
                <input type="text" id="company_name" class="form-control" placeholder="회사 이름" maxlength="50">
                <input type="text" id="business_number" class="form-control" placeholder="사업자 번호" maxlength="50">
                <input type="text" id="company_number" class="form-control" placeholder="회사 연락처" maxlength="50">
            </div>
            <div>
                <div id="toggleAll">
                    <span>모두 동의합니다.</span>
                </div>
                <label><br>
                    <input type="checkbox" id="over_14" class="checkbox" required="required"> 만 14세 이상입니다.
                </label>
                <label><br>
                    <input type="checkbox" id="terms_agree" class="checkbox" required="required"> [필수] 이용약관
                </label>
                <label><br>
                    <input type="checkbox" id="privacy_agree" class="checkbox" required="required"> [필수] 개인정보 수집 및 이용 동의
                </label>
            </div>
            <button id="submitBtn" class="btn btn-primary form-control">가입</button>
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

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    document.getElementById('submitBtn').addEventListener('click', function(event) {
        event.preventDefault();

        // 폼 데이터 수집
        const formData = {
            name: document.getElementById('name').value,
            email: document.getElementById('email').value,
            phone_number: document.getElementById('phone_number').value,
            password: document.getElementById('password').value,
            password_confirmation: document.getElementById('password_confirmation').value,
            company_name: document.getElementById('company_name').value,
            business_number: document.getElementById('business_number').value,
            company_number: document.getElementById('company_number').value,
            over_14: document.getElementById('over_14').checked, // 약관동의
            terms_agree: document.getElementById('terms_agree').checked, // 약관동의
            privacy_agree: document.getElementById('privacy_agree').checked // 약관동의
        };

        axios.post('/auth/join', formData)
            .then(function(response) {
                alert('가입이 정상적으로 완료되었습니다!');
                window.location.href = '/auth/login'; // 성공 후 로그인 페이지로 이동
            })
            .catch(function(error) {
                if (error.response.status !== 200) {
                    const errors = error.response.data.errors;
                    alert('회원 가입 시 오류가 발생했습니다. \n' + errors.join('\n'));
                }
            });
    });
</script>
@endsection