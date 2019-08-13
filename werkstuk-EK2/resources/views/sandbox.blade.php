@extends('layout')

@section('content')
    <div class="account-info-panel">
        <h2 class="user-name">{{auth()->user()->name}}</h2>
        <p class="user-email">{{auth()->user()->email}}</p>
    </div>
@endsection