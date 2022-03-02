

<div class="media">
    @include('users.partial.avatar', ['user' => $article->user])

    <div class="media-body">
        <h4 class="media-heading">
            <a href="{{ route('articles.show', $article->id) }}">
                {{ $article->title }}
            </a>
        </h4>

        <p class="text-muted meta__article">
            <a href="{{ gravatar_profile_url($article->user->email) }}">
                {{ $article->user->name }}
            </a>

            <small>
                • {{ $article->created_at->diffForHumans() }}
{{--                • {{ trans('forum.articles.form_view_count') }} {{ $article->view_count }}--}}

{{--                @if ($article->comment_count > 0)--}}
{{--                    • {{ trans('forum.comments.title') }} {{ $article->comment_count }}--}}
{{--                @endif--}}
            </small>
        </p>

        @if ($viewName === 'articles.index')
{{--            @include('tags.partial.list', ['tags' => $article->tags])--}}
        @endif

        @if ($viewName === 'articles.show')
{{--            @include('attachments.partial.list', ['attachments' => $article->attachments])--}}
        @endif
    </div>
</div>


{{--
 <tr>
                    <td><a href="{{route('articles.index')}}">{{auth()->user()->id}}</a></td>
                    <td><a href="#">{{ trans('forum.title') }}</a></td>
                    <td>
                        <a href="#">{{auth()->user()->name}}
{{--                            {{$tag->name}}--}}
{{--                            @if ($tagCount = $tag->articles->count())--}}
{{--                                <span class="badge badge-default">{{ $tagCount }}</span>--}}
{{--                            @endif--}}
{{--</a>--}}
{{--</td>--}}
{{--<td><a href="{{route('articles.index')}}">{{auth()->user()->created_at}}</a></td>--}}
{{--</tr>--}}
--}}