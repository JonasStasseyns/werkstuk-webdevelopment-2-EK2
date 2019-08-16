@extends('layout')

@section('content')
    <div class="projects-list-container">
        <p class="bread"><a href="/projects">projects</a> > <a href="/projects">index</a></p>
        @foreach($projects as $project)
            <div class="projects-list-card">
                {{--<img class="project-list-img" src="{{asset('storage/'.$project->image)}}" alt="{{$project->image}}">--}}
                <a href="/projects/{{$project->id}}"><img class="project-list-img" src="{{$project->image}}" alt="{{$project->image}}"></a>
                <h3 class="project-list-title">{{$project->title}}</h3>
                <p class="percent-funded">{{round($project->current/$project->target*100)}}% funded</p>
                <p class="project-list-text">{{$project->description}}</p>
                <a href="/projects/{{$project->id}}"><button class="featured-rm">Read More</button></a>
            </div>
        @endforeach
        <div class="pagination">
            {!! $projects->links(); !!}
        </div>
    </div>

@endsection