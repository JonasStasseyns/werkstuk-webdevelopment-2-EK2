@extends('layout')

@section('content')
    <div class="projects-list-container">
        <p class="bread"><a href="/">projects</a> > <a href="">index</a></p>
        @foreach($projects as $project)
            <div class="projects-list-card">
                {{--<img class="project-list-img" src="{{asset('storage/'.$project->image)}}" alt="{{$project->image}}">--}}
                <img class="project-list-img" src="{{$project->image}}" alt="{{$project->image}}">
                <h3 class="featured-title">{{$project->title}}</h3>
                <p class="project-list-text">{{$project->description}}</p>
                <a href="">
                    <button class="featured-rm">Read More</button>
                </a>

            </div>
        @endforeach
        <div class="pagination">
            {!! $projects->links(); !!}
        </div>
    </div>

@endsection