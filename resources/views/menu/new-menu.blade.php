@extends('layouts.layout')
@section('headerTitle')
    <title>새 메뉴</title>
@endsection
@section('content')
    <div class="container">
        <div class="col-lg-8"></div>
        <div class="col-lg-8">
            <div class="jumbotron" style="padding-top: 20px; text-align: center;">
                <h3 style="text-align: center;">새 메뉴 만들기</h3>
                <div class="form-group" style="text-align: left">
                    카테고리: <input type="text" id="category" class="form-control" placeholder="카테고리" maxlength="20" value="">
                    태그: <input type="email" id="tag" class="form-control" placeholder="태그" maxlength="50" value="" >
                    제목: <input type="text" id="title" class="form-control" placeholder="제목" maxlength="50" value="">
                    설명: <input type="text" id="sub_title" class="form-control" placeholder="설명" maxlength="50" value="">
                    가격:<input type="number" id="price" class="form-control" placeholder="가격" maxlength="50" value="">
                    사진 업로드: <input type="text" id="img_url" class="form-control" placeholder="사진" maxlength="50" value="">
                </div>
                <button id="newMenu" class="btn btn-primary form-control">저장</button>
            </div>
        </div>
    </div>
    <style>
    </style>
    <script>
        document.getElementById('newMenu').addEventListener('click', function(event) {
            event.preventDefault();

            // 폼 데이터 수집
            const formData = {
                category: document.getElementById('category').value,
                tag: document.getElementById('tag').value,
                title: document.getElementById('title').value,
                sub_title: document.getElementById('sub_title').value,
                price: document.getElementById('price').value,
                img_url: document.getElementById('img_url').value,
            };

            axios.post('/auth/new-menu', formData)
                .then(function(response) {
                    if(response.status === 200) {
                        alert('정상적으로 저장되었습니다.');
                        window.location.href = '/auth/menu';
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