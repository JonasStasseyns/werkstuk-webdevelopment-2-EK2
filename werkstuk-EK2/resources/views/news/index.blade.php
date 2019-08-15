@extends('layout')

@section('content')
    <p class="bread"><a href="/news">news</a> > <a href="/news">index</a></p>
    @foreach($news as $new)
        <div class="projects-list-card">
            {{--<img class="project-list-img" src="{{asset('storage/'.$project->image)}}" alt="{{$project->image}}">--}}
            <img class="project-list-img" src="{{$new->image}}" alt="{{$new->image}}">
            <h3 class="project-list-title">{{$new->title}}</h3>
            <p class="project-list-text">{{$new->text}}</p>
            <a href="">
                <button class="featured-rm">Read More</button>
            </a>

        </div>
    @endforeach
@endsection