@extends('layouts.layout')
@section('content')
    <div class="page-header">
        <h4> 포럼
{{--            <small>/ {{$article->title}}</small>--}}
        </h4>
    </div>
    <article>
{{--        @include('articles.partial.article', compact('articles'))--}}
{{--        <p>{!! mardown($article->count) !!}</p>--}}
    </article>
    <div class="text-center action__article">
{{--        <a href="{{route('articles.edit')}}" class="btn btn-info">--}}
        <a class="btn btn-info">
            <i class="fa fa-pencil"></i>글 수정
        </a>

{{--        </a>--}}
        <button class="btn btn-danger">
            <i class="fa fa-trash-o"></i>글 삭제
        </button>
        <a href="{{route('articles.index')}}" class="btn btn-default">
            <i class="fa fa-list"></i>글 목록
        </a>
    </div>
@stop