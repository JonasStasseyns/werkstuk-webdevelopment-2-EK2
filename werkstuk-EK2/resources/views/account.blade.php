@extends('layout')

@section('content')
    <div class="account-info-panel">
        <div class="account-info-image-container">
            @if(empty(Auth::user()->image))
                <img class="account-image" src="{{asset('storage/uploads/default.png')}}">
            @else
                <img class="account-image" src="{{asset('storage/'.auth()->user()->image)}}">
            @endif
            {{--<img class="account-image" src="{{auth()->user()->image}}">--}}
            <form action="/account" method="post" enctype="multipart/form-data" id="profile-form">
                {{csrf_field()}}
                <input class="update-image-input" type="file" name="image" placeholder="change picture" id="image">
                {{--<input class="create-project-submit update-acc-img-sub" type="submit" value="Update">--}}
            </form>
            @if(Auth::user()->type=='admin')
                <br><a href="/admin"><button class="create-project-submit">Manage Website</button></a>
            @endif
            <a href="/credits"><button class="create-project-submit">Purchase credits</button></a>
        </div>
        <div class="account-info-text-container">
            <h2 class="user-name">{{auth()->user()->name}}</h2>
            <form method="post" action="/account/update">
                {{csrf_field()}}
                <input class="create-project-input account-email-input" type="text" name="email" placeholder="Your email" id="title" value="{{Auth::user()->email}}">
                <input type="submit" value="Update" class="create-project-submit">
            </form>
        </div>
    </div>

    <div class="proj-don-container">
        <div class="your-projects-list">
            <h2>Your projects</h2>
            @if(!$projects->isEmpty())
                @foreach($projects as $project)
                    <div class="your-project"><a href="/projects/{{$project->id}}">{{$project->title}}</a></div>
                @endforeach
            @else
                <br><br><p>You don't have any projects.</p>
            @endif
        </div>
        <div class="your-donations-list">
            <h2>Your donations</h2>
            @if(!$donations->isEmpty())
                @foreach($donations as $donation)
                    <div class="your-project"><a href="/projects/{{$donation->id}}">{{$donation->title}}</a><p>{{$donation->credits}}</p></div>
                @endforeach
            @else
                <br><br><p>You don't have any donations.</p>
            @endif
        </div>
    </div>
    <script>
      document.getElementById("image").onchange = function() {
        document.getElementById("profile-form").submit();
      };
    </script>
@endsection