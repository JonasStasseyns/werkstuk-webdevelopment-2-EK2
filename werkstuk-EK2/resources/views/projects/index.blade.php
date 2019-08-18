@extends('layout')

@section('content')
    <div class="projects-list-container">
        <h2 class="projects-title-index">Projects
        </h2>
        <div class="categories-container">
            @foreach($categories as $cat)
                <a href="/projects/category/{{$cat->category}}"><button class="project-category-button">{{$cat->category}}</button></a>
            @endforeach
        </div>
        @foreach($projects as $project)
            <div class="projects-list-card">
                {{--<img class="project-list-img" src="{{asset('storage/'.$project->image)}}" alt="{{$project->image}}">--}}
                <a href="/projects/{{$project->id}}"><img class="project-list-img" src="{{$project->image}}" alt="{{$project->image}}"></a>
                <p class="cat-small">projects › {{$project->category}}</p>
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