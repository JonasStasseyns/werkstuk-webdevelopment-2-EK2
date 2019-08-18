@extends('layout')
@section('content')
    <div class="admin-section">
        <h2 class="featured-title">Edit categories</h2>
        @foreach($categories as $cat)
            <a href="/admin/categories/delete/{{$cat->id}}" class="admin-cat-item"><span class="admin-cat-item-span">DELETE </span>{{$cat->category}}</a>
        @endforeach
    </div>
    <div class="admin-section">b</div>
    <div class="admin-section">c</div>
@endsection