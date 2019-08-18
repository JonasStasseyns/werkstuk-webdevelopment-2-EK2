@extends('layout')

@section('content')
    @if(!empty($editmode))
        <form method="post" action="/projects/edit/update">
    @endif

    <div class="featured-container">
        <div class="featured-content edit-container">
            <p class="cat-small">projects > {{$project->category}}</p>
            @if(!empty($editmode) && Auth::user() && Auth::user()->id == $project->user)
                {{csrf_field()}}
                <input type="hidden" name="id" value="{{$project->id}}">
                <label>Project title
                    <input type="text" name="title" class="create-project-input" value="{{$project->title}}">
                </label>
            @else
                <h1 class="featured-title">{{$project->title}}</h1>
            @endif

            @if(!empty($editmode) && Auth::user() && Auth::user()->id == $project->user)
                <label>Project short description
                    <textarea name="description" class="create-project-textarea">{{$project->description}}</textarea>
                </label>
            @else
                <p class="featured-text detail-content">{!! $project->content !!}</p>
            @endif

            @if(!empty($editmode) && Auth::user() && Auth::user()->id == $project->user)
                <label>Project description
                    <textarea name="content" class="create-project-textarea">{{$project->content}}</textarea>
                </label>
            @endif

            @if(!empty($editmode) && Auth::user() && Auth::user()->id == $project->user)
                <label for="category">Category</label>
                <select class="create-project-select create-project-input" name="category">
                    <option value="{{$project->category}}" selected>{{$project->category}}</option>
                    <option value="arts">arts</option>
                    <option value="crafts">crafts</option>
                    <option value="film">film</option>
                    <option value="games">games</option>
                    <option value="music">music</option>
                    <option value="publishing">publishing</option>
                    <option value="tech">tech</option>
                </select>

                <label for="title">Project target (€)</label>
                <input class="create-project-input" type="number" name="target" placeholder="Project target" id="title" value="{{$project->target}}">

                <label for="image">Project image</label>
                <input class="create-project-input" type="file" name="image" placeholder="project title" id="image">

                <input class="create-project-submit" type="submit" value="submit">
            @endif

        </div>
        <div class="right">
            {{--<img class="featured-img" src="{{$project->image}}">--}}
            <img class="account-image" src="{{asset('storage/'.$project->image)}}">
            <div class="donate-container">
                <h3>Donate to this project</h3>
                <div class="progress-parent">
                    <div class="progress" style="width: {{$project->current/$project->target*100}}%;"><strong>{{round($project->current/$project->target*100)}}%</strong></div>
                </div><br>
                @if(Auth::user())
                    @if(Auth::user()->id != $project->user)
                        <a href="/donate/{{$project->id}}"><button class="donate-submit">Donate</button></a>
                    @else
                        <a href=""><button class="donate-submit">This is your project</button></a>
                        <a href="/projects/edit/{{$project->id}}"><button class="donate-submit">Edit project</button></a>
                        <a href="/projects/donations/{{$project->id}}"><button class="donate-submit">Donation list</button></a>
                        <a href="/projects/featurize/{{$project->id}}"><button class="donate-submit">Make featured</button></a>
                    @endif
                @else
                    <a href="/login"><button class="donate-submit">Log in to donate</button></a>
                @endif
            </div>
        </div>
    </div>
    @if(!empty($editmode))
        </form>
    @else
        <h2>Comments</h2>
        <form action="/comment/projects/{{$project->id}}" class="comment-form" method="post">
            {{csrf_field()}}
            <textarea class="comment-ta" name="comment" placeholder="Your comment..."></textarea>
            <input type="submit" class="comment-submit" value="Send">
        </form>
        @foreach($comments as $comment)
            <p class="comment-line"><span class="comment-username">{{$comment->username}}</span> {{$comment->comment}}</p>
        @endforeach
    @endif
@endsection