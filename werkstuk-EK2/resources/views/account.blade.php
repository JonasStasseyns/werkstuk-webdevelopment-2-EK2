@extends('layout')

@section('content')
    <div class="account-info-panel">
        <h2 class="user-name">{{auth()->user()->name}}</h2>
        <p class="user-email">{{auth()->user()->email}}</p>
    </div>
    @foreach($projects as $project)
        <div class="projects-list-card">
            <img class="project-list-img" src="{{$project->image}}" alt="{{$project->image}}">
            <h3 class="featured-title">{{$project->title}}</h3>
            <p class="project-list-text">{{$project->description}}</p>
            <a href=""><button class="featured-rm">Read More</button></a>

        </div>
    @endforeach
@endsection