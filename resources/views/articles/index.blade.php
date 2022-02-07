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
                <article>
                    @forelse($articles as $articles)
                        @include('$articles.partial.articles', ['articles => $articles'])
                    @empty
                        <p>{{trans('errors.not_found_description')}}</p>
                    @endforelse
                    <div>
{{--                        {!! $articles->appends(Request::except('page'))->render() !!}--}}
                    </div>
                </article>
                <tr>
                    <td><a href="#">1</a></td>
                    <td><a href="#">{{$article->title}}</a></td>
                    <td>
                        <a href="#">
{{--                            {{$tag->name}}--}}
{{--                            @if ($tagCount = $tag->articles->count())--}}
{{--                                <span class="badge badge-default">{{ $tagCount }}</span>--}}
{{--                            @endif--}}
                        </a>
                    </td>
                    <td><a href="#">2</a></td>
                </tr>
                {{--                <tr>--}}
                {{--                    @forelse($articles as $article)--}}
                {{--                        @include('$articles.partial.article', compact('article'))--}}
                {{--                    @empty--}}
                {{--                        <td><a href="#">number</a></td>--}}
                {{--                        --}}{{--                <td><a href="#">{{$article -> title}}</a></td>--}}
                {{--                        <td><a href="#">title</a></td>--}}
                {{--                        <td><a href="#">2</a></td>--}}
                {{--                        <td><a href="#">2</a></td>--}}
                {{--                    @endforelse--}}
                {{--                </tr>--}}
                </article>
                </tbody>
            </table>

            <a href="#" class="btn btn-success btn-arrow-left">이전</a>

            <a href="#"
               class="btn btn-success btn-arrow-left">다음</a>
            <a href="{{route('articles.create')}}" class="btn btn-primary pull-right">글쓰기</a>
        </div>
    </div>
@endsection
