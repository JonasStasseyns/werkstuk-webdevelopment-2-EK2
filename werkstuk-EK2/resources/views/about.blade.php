@extends('layout')

@section('content')

<h2 class="featured-title">About Project Crowdsupport</h2>

<p class="featured-text">
    @foreach($about as $ab) {!! $ab->content !!} @endforeach
</p>

@endsection