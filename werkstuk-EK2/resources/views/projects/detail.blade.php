@extends('layout')

@section('content')
    <div class="featured-container">
        <div class="featured-content">
            <h1 class="featured-title">{{$project->title}}</h1>
            <p class="featured-text detail-content">{!! $project->content !!}</p>
        </div>
        <div class="right">
            {{--<img class="featured-img" src="{{$project->image}}">--}}
            <img class="account-image" src="{{asset('storage/'.$project->image)}}">
            <div class="donate-container">
                <h3>Donate to this project</h3>
                <div class="progress-parent">
                    <div class="progress" style="width: {{$project->current/$project->target*100}}%;"><strong>{{round($project->current/$project->target*100)}}%</strong></div>
                </div><br>
                @if(Auth::user())
                    <a href="/donate/{{$project->id}}"><button class="donate-submit">Donate</button></a>
                @else
                    <a href="/login"><button class="donate-submit">Log in to donate</button></a>
                @endif
            </div>
        </div>
    </div>
    <h2>Comments</h2>
    <form action="/comment/project/{{$project->id}}" class="comment-form" method="post">
        {{csrf_field()}}
        <textarea class="comment-ta" name="comment" placeholder="Your comment..."></textarea>
        <input type="submit" class="comment-submit" value="Send">
    </form>
    @foreach($comments as $comment)
        <p class="comment-line"><span class="comment-username">{{$comment->username}}</span> {{$comment->comment}}</p>
    @endforeach
@endsection