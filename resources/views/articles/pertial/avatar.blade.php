@php
    $size = isset($size) ? $size : 48;
@endphp

@if (isset($user) and $user)
    <a class="pull-left" href="{{\App\gravatar_profile_url($user->email)}}">
        <img src="{{\App\gravatar_url($user->email, $size)}}" class="media-object img-thumbnail" alt="{{$user->name}}">
    </a>
@else
<a class="pull-left" href="{{\App\gravatar_profile_url('unknown@example.com')}}">
    <img class="media-object img-thumbnail" alt="Unknown User" src="{{\App\gravatar_profile_url('unKnown@example.com', $size)}}">
</a>
@endif