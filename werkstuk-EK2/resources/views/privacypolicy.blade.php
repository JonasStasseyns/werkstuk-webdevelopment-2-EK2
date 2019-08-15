@extends('layout')

@section('content')

@foreach($privacy as $pri) {!! $pri->content !!} @endforeach

@endsection