@extends('layout')

@section('content')

<h2>Featured projects</h2>

@foreach($projects as $project)
    <div class="featured-container">
        <div class="featured-content">
            <h3 class="featured-title">{{$project->title}}</h3>
            <p class="featured-text">{{$project->description}}</p>
            <a href="/projects/{{$project->id}}"><button class="featured-rm">Read More</button></a>
        </div>
        {{--<img class="featured-img" src="{{$project->image}}">--}}
        <img class="featured-img" src="storage/{{$project->image}}">
    </div>
@endforeach

@endsection