@extends('layouts.layout')
@section('content')
    <div class="page-header">
        <h4>포럼
            <small>/ 글 수정 /
                {{--                {{$article->title}}--}}
            </small>
        </h4>
    </div>
    <form action="{{route('articles.update')}}"
          method="post">
        {!!csrf_token()!!}
        {!! method_field('PUT') !!}

    </form>
@endsection