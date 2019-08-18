@extends('layout')

@section('content')
    <div class="projects-list-container">
        <h2 class="projects-title-index">Projects
        </h2>
        <div class="categories-container">
            <a href="/projects/category/arts"><button class="project-category-button">Arts</button></a>
            <a href="/projects/category/crafts"><button class="project-category-button">Crafts</button></a>
            <a href="/projects/category/publishing"><button class="project-category-button">Publishing</button></a>
            <a href="/projects/category/music"><button class="project-category-button">Music</button></a>
            <a href="/projects/category/film"><button class="project-category-button">Film</button></a>
            <a href="/projects/category/games"><button class="project-category-button">Games</button></a>
            <a href="/projects/category/tech"><button class="project-category-button">Tech</button></a>
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