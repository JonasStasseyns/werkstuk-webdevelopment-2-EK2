@extends('layout')

@section('content')
    <div class="featured-container">
        <div class="featured-content">
            <h1 class="featured-title">{{$project->title}}</h1>
            <p class="featured-text detail-content">{!! $project->content !!}</p>
        </div>
        <div class="right">
            <img class="featured-img" src="{{$project->image}}">
            <div class="donate-container">
                <h3>Donate to this project</h3>
                <a href="/donate/{{$project->id}}"><button class="donate-submit">Donate</button></a>
            </div>
        </div>
    </div>
@endsection