@extends('layout')

@section('content')
    <img class="news-detail-image" src="{{$news->image}}">
    {{--<img class="news-detail-image" src="{{asset('storage/'.$news->image)}}">--}}
    <div class="news-container">
        <div class="news-content">
            <h2 class="news-title">{{$news->title}}</h2>
            <p class="news-text">{!! $news->text !!}</p>
        </div>
        <div class="news-comments">
            <h2>Comments</h2>
            @if(Auth::user())
                <form action="/comment/news/{{$news->id}}" class="comment-form" method="post">
                    {{csrf_field()}}
                    <textarea class="comment-ta news-comment-ta" name="comment" placeholder="Your comment..."></textarea>
                    <input type="submit" class="comment-submit news-comment-submit" value="Send">
                </form>
            @else
                <br><br><h4>Log in to place comments</h4>
            @endif
            @foreach($comments as $comment)
                <p class="datetime-news-comment"><span class="comment-username news-comment-username">{{$comment->username}}</span>{{$comment->created_at}}</p>
                <p class="comment-line news-comment-line">{{$comment->comment}}</p>
            @endforeach
        </div>
    </div>
@endsection