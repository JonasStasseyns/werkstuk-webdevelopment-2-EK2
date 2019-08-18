@extends('layout')

@section('content')
    <h2 class="projects-title-index">News</h2><p><br></p>
    @foreach($news as $new)
        <div class="projects-list-card">
            {{--<img class="project-list-img" src="{{asset('storage/'.$project->image)}}" alt="{{$project->image}}">--}}
            <img class="project-list-img" src="{{$new->image}}" alt="{{$new->image}}">
            <h3 class="project-list-title">{{$new->title}}</h3>
            <p class="project-list-text">{!! $new->text !!}</p>
            <a href="/news/{{$new->id}}"><button class="featured-rm">Read More</button></a>

        </div>
    @endforeach
@endsection