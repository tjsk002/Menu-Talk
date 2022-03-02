{{--<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">--}}
{{--    <label for="title">제목</label>--}}
{{--    <input type="text" name="title" id="title" value="{{old('title', $article->title)}}">--}}
{{--    {!! $errors->first('title','<span class="form-error">:message</span>') !!}--}}
{{--</div>--}}

{{--<div class="form-group">--}}
{{--    <label for="content">본문</label>--}}
{{--    <textarea name="content" id="content" rows="10" class="">--}}
{{--        {{old('content', $article->content)}}--}}
{{--    </textarea>--}}
{{--    {!! $errors->first('content','<span class="form-error">:message</span>') !!}--}}
{{--</div>--}}
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
    <tr class="form-group {{ $errors->has('title') ? 'has-error' : 'error' }}">
        <td>
            <input type="text" class="form-control form-group"
                   placeholder="글 제목" name="title" maxlength="50" value="{{old('title', $article->title)}}">
            {{--            {!! $errors->first('title','<span class="form-error">:message</span>') !!}--}}
        </td>
    </tr>
    <tr>
        <td>
        							<textarea class="form-control" placeholder="글 내용"
                                              name="content" maxlength="2048" style="height: 350px;">
                                        {{old('content', $article->content)}}
        							</textarea>
            {{--            {!! $errors->first('content','<span class="form-error">:message</span>') !!}--}}
        </td>
    </tr>
    </tbody>
</table>