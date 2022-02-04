@extends('layouts.layout')

@section('headerTitle')
    <title>게시판 목록</title>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <table class="table table-striped"
               style="text-align: center; border: 1px solid #dddddd;">
            <thead>
            <tr>
                <th style="background-color: #eeeeee; text-align: center;">번호</th>
                <th style="background-color: #eeeeee; text-align: center;">제목</th>
                <th style="background-color: #eeeeee; text-align: center;">작성자</th>
                <th style="background-color: #eeeeee; text-align: center;">작성일</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td><a href="#">2</a></td>
                <td><a href="#">2</a></td>
                <td><a href="#">2</a></td>
                <td><a href="#">2</a></td>
            </tr>
            </tbody>
        </table>

        <a href="#" class="btn btn-success btn-arrow-left">이전</a>

        <a href="#"
           class="btn btn-success btn-arrow-left">다음</a>
        <a href="{{route('articles.create')}}" class="btn btn-primary pull-right">글쓰기</a>
    </div>
</div>
@endsection
