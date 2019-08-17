@extends('layout')

@section('content')
    <div class="your-donations-list">
        <h2>Donations to your project</h2>
        @if(!$donations->isEmpty())
            @foreach($donations as $donation)
                <div class="your-project"><p>{{$donation->name}}</p><p>{{$donation->credits}}</p></div>
            @endforeach
        @else
            <br><br><p>This project doesn't have any donations yet.</p>
        @endif
    </div>
@endsection