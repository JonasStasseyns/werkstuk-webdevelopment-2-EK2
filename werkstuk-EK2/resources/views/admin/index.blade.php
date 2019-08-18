@extends('layout')
@section('content')
    <div class="admin-section">
        <h2 class="featured-title">Edit categories</h2>
        @foreach($categories as $cat)
            <a href="/admin/categories/delete/{{$cat->id}}" class="admin-cat-item"><span class="admin-cat-item-span">DELETE </span>{{$cat->category}}</a>
        @endforeach
        <div class="admin-add-cat-form">
            <form method="post" action="/admin/categories/add">
                {{csrf_field()}}<br>
                <label for="category">Add category</label>
                <input type="text" name="category" class="create-project-input" placeholder="category name">
                <input type="submit" class="create-project-submit" value="Add">
            </form>
        </div>
    </div>
@endsection