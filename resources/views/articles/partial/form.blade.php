<table class="table table-striped"
       style="text-align: center; border: 1px solid #dddddd;">
    <thead>
    <tr>
        <th colspan="2"
            style="background-color: #eeeeee; text-align: center;">게시판 글쓰기
        </th>
    </tr>
    </thead>
    <tbody>
    <tr class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
        {!! csrf_field() !!}
        <td>
            <input type="text" class="form-control form-group"
                   placeholder="글 제목" name="title" maxlength="50" value="{{old('title', $article->title)}}">
{{--            old('title') 유효성 검사에 실패해서 이 페이지로 다시 돌아왔을 때 사용자가 입력했던 값을 유지하기 위한 도우미 함수--}}
            {!! $errors->first('title','<span class="form-error">제목을 입력해 주세요.</span>') !!}
        </td>
    </tr>
    <tr>
        <td>
        <textarea class="form-control" placeholder="글 내용" name="content" maxlength="2048" style="height: 350px;">{{old('content', $article->content)}}</textarea>{!! $errors->first('content','<span class="form-error">글의 내용을 입력해 주세요.(최소5자이상)</span>') !!}
        </td>
    </tr>
    </tbody>
</table>