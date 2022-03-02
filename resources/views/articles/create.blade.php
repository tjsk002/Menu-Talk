@extends('layouts.layout')

@section('headerTitle')
    <title>게시판 작성</title>
@endsection

@section('content')
    <div class="container">
        <div class="page-header">
            <h4>
                <button>
                    <a href="{{ route('articles.index') }}">
                        {{ trans('forum.title') }} 게시판 목록 페이지로 이동 click
                    </a>
                </button>
                <small>
                    / {{ trans('forum.articles.create') }}
                </small>
            </h4>
        </div>
        <div class="row">
            <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data"
                  class="form__article">
                {!! csrf_field() !!}
                @include('articles.partial.form')
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary pull-right">
                        {{ trans('forum.articles.store') }} 글쓰기
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection