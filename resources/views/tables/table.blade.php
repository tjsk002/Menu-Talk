@extends('layouts.layout')
@section('headerTitle')
    <title>내 테이블 관리</title>
@endsection
@section('content')
    <div class="container">
        <div class="col-lg-8"></div>
        <div class="col-lg-8">
            <div class="jumbotron" style="padding-top: 20px;">
                <h3 style="text-align: center;">내 테이블 관리</h3>
                <div class="form-group">
                    테이블 총 개수 :
                    <input type="text" id="count" class="form-control" maxlength="20" value="{{$user->table_count}}">
                </div>
                <button id="myTableCount" class="btn btn-primary form-control">수정</button>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('myTableCount').addEventListener('click', function(event) {
            event.preventDefault();

            const formData = {
                count: document.getElementById('count').value,
            };

            axios.post('/auth/table', formData)
                .then(function(response) {
                    if(response.status === 200) {
                        alert('수정이 정상적으로 완료되었습니다!');
                        window.location.href = '/auth/table';
                    }
                })
                .catch(function(error) {
                    if (error.response.status !== 200) {
                        const errors = error.response.data.errors;
                        alert(errors);
                    }
                });
        });
    </script>
@endsection