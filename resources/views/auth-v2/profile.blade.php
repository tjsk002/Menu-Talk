@extends('layouts.layout')
@section('headerTitle')
    <title>로그인</title>
@endsection
@section('content')
<div class="container">
    <div class="col-lg-4"></div>
    <div class="col-lg-4">
        <div class="jumbotron" style="padding-top: 20px;">
            <h3 style="text-align: center;">내 프로필</h3>
            @if($user)
            <div class="form-group">
                이름: <input type="text" id="name" class="form-control" placeholder="이름" maxlength="20" value="{{$user->getName()}}">
                이메일: <input type="email" id="email" class="form-control" placeholder="이메일" maxlength="50" value="{{$user->getEmail()}}" readonly>
                핸드폰 번호: <input type="text" id="phone_number" class="form-control" placeholder="핸드폰 번호" maxlength="50" value="{{$user->getPhoneNumber()}}"><br>

                회사 이름: <input type="text" id="company_name" class="form-control" placeholder="회사 이름" maxlength="50" value="{{$user->getCompanyName()}}">
                사업자 번호:<input type="text" id="business_id" class="form-control" placeholder="사업자 번호" maxlength="50" value="{{$user->getBusinessId()}}">
                회사 연락처: <input type="text" id="company_number" class="form-control" placeholder="회사 연락처" maxlength="50" value="{{$user->getCompanyNumber()}}">
            </div>
            <button id="myProfile" class="btn btn-primary form-control">수정</button>
            @endif
        </div>
    </div>
</div>
<script>
    document.getElementById('myProfile').addEventListener('click', function(event) {
        event.preventDefault();

        // 폼 데이터 수집
        const formData = {
            name: document.getElementById('name').value,
            email: document.getElementById('email').value,
            phone_number: document.getElementById('phone_number').value,
            company_name: document.getElementById('company_name').value,
            business_id: document.getElementById('business_id').value,
            company_number: document.getElementById('company_number').value,
        };

        axios.post('/auth/profile', formData)
            .then(function(response) {
                if(response.status === 200) {
                    alert('수정이 정상적으로 완료되었습니다!');
                    window.location.href = '/auth/profile';
                }
            })
            .catch(function(error) {
                if (error.response.status !== 200) {
                    const errors = error.response.data.errors;
                    alert('수정 시 오류가 발생했습니다. \n' + errors.join('\n'));
                }
            });
    });
</script>
@endsection