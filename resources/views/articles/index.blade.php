@extends('layouts.layout')

@section('headerTitle')
    <title>게시판 포럼 / 글목록</title>
@endsection

@section('content')
    @php $viewName = 'articles.index';
    @endphp

    <div class="container">
        <div class="row">
            <!--정렬 UI-->
            <div class="btn-group sort__article" style="padding-bottom: 20px">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-sort"></i>
                    {{ trans('forum.articles.sort') }} 일단 보류
                    <span class="caret"></span>
                </button>

            </div>

            <table class="table table-striped"
                   style="text-align: center; border: 1px solid #dddddd;">
{{--                <thead>--}}
{{--                <tr>--}}
{{--                    <th style="background-color: #eeeeee; text-align: center;">번호</th>--}}
{{--                    <th style="background-color: #eeeeee; text-align: center;">제목</th>--}}
{{--                    <th style="background-color: #eeeeee; text-align: center;">작성자</th>--}}
{{--                    <th style="background-color: #eeeeee; text-align: center;">작성일</th>--}}
{{--                </tr>--}}
{{--                </thead>--}}


                <tbody>

                <tr>
                    @forelse($articles as $article)
                        <li>
                            {{$article->title}}
                            <samll>
                                {{--                                                                by{{$article->user->name}}--}}
                            </samll>
                        </li>
                        @include('articles.partial.article', compact('article'))
                    @empty
                        <td class="text-center text-danger">글이 없습니다.</td>
                    @endforelse
                </tr>

                </tbody>
            </table>
            @if($articles -> count())
                <div class="text-center">
                    {!! $articles->appends(Request::except('page'))->render() !!}
                </div>

            @endif
            @if(auth()->user())
                <a href="{{route('articles.create')}}" class="btn btn-primary pull-right">글쓰기</a>
            @endif
        </div>
    </div>

@endsection
