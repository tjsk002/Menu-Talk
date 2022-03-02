

<div class="media">
{{--    @include('users.partial.avatar',['user'=>$article->user])--}}
    <div class="media-body">
        <h4 class="media-heading">
            {{$article->title}}</h4>
        <p class="text-muted">
            <i class="fa fa-user"></i> {{$article->user->name}}
            <i class="fa fa-clock-o"></i> {{$article->created_at->diffForhuman()}}
        </p>

        <p>article 상세 페이지</p>
        <a href="{{route('articles.show', '$article->id')}}">
            {{$article->title}}
        </a>
    </div>
</div>