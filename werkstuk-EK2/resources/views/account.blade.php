@extends('layout')

@section('content')
    <div class="account-info-panel">
        <div class="account-info-image-container">
            <img class="account-image" src="{{asset('storage/'.auth()->user()->image)}}">
            {{--<img class="account-image" src="{{auth()->user()->image}}">--}}
            <form action="/account" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <input class="update-image-incput" type="file" name="image" placeholder="change picture" id="image">
                <input class="create-project-submit" type="submit" value="Update">
            </form>
        </div>
        <div class="account-info-text-container">
            <h2 class="user-name">{{auth()->user()->name}}</h2>
            <p class="user-email">{{auth()->user()->email}}</p>
        </div>
    </div>
    <h2>Your projects</h2>
    @foreach($projects as $project)
        <div class="projects-list-card">
            <img class="project-list-img" src="{{$project->image}}" alt="{{$project->image}}">
            <h3 class="featured-title">{{$project->title}}</h3>
            <p class="project-list-text">{{$project->description}}</p>
            <a href=""><button class="featured-rm">Read More</button></a>
        </div>
    @endforeach
@endsection