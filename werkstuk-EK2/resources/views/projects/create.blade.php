@extends('layout')

@section('content')

<p class="bread"><a href="/">projects</a> > <a href="">create</a></p>

<h1 class="create-project-h1">Create project</h1>

<form action="/projects" method="post">

    {{csrf_field()}}

    <label for="title">Project title</label>
    <input class="create-project-input" type="text" name="title" placeholder="project title" id="title">

    <label for="description">Project description</label>
    <textarea class="create-project-textarea" name="description" placeholder="description" id="description"></textarea>

    <label for="image">Project image</label>
    <input class="create-project-input" type="text" name="image" placeholder="project title" id="image">

    <input class="create-project-submit" type="submit" value="submit">

</form>

@endsection