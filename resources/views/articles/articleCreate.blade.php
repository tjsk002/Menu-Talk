@extends('layouts.layout')

@section('headerTitle')
    <title>게시판 작성</title>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <form method="post" action="{{route('articles.create')}}">
            {!! csrf_field() !!}
            <table class="table table-striped"
                   style="text-align: center; border: 1px solid #dddddd;">
                <thead>
                <tr>
                    <th colspan="2"
                        style="background-color: #eeeeee; text-align: center;">게시판 글쓰기 양식
                    </th>

                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        <input type="text" class="form-control"
                               placeholder="글 제목" name="title" maxlength="50">
                    </td>
                </tr>
                <tr>
                    <td>
							<textarea class="form-control" placeholder="글 내용"
                                      name="content" maxlength="2048" style="height: 350px;">
							</textarea>
                    </td>
                </tr>
                </tbody>
            </table>
            <input type="submit" class="btn btn-primary pull-right" value="글쓰기">
        </form>
    </div>
</div>
@endsection