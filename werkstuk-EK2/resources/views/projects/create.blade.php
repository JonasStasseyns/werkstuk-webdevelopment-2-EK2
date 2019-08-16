@extends('layout')

@section('content')

<p class="bread"><a href="/">projects</a> > <a href="">create</a></p>

<h1 class="create-project-h1">Create project</h1>

<form action="/projects" method="post" enctype="multipart/form-data">

    {{csrf_field()}}

    <input type="hidden" name="user" value="{{ Auth::user()->id }}">

    <label for="title">Project title</label>
    <input class="create-project-input" type="text" name="title" placeholder="Project title" id="title">

    <label for="title">Project target</label>
    <input class="create-project-input" type="number" name="target" placeholder="Project target" id="title">

    <label for="description">Short project description</label>
    <textarea class="create-project-textarea" name="description" placeholder="Short description" id="description"></textarea>

    <label for="description">Project description</label>
    <textarea class="create-project-textarea" name="content" placeholder="Description" id="description"></textarea>

    <label for="image">Project image</label>
    <input class="create-project-input" type="file" name="image" placeholder="project title" id="image">


    <input class="create-project-submit" type="submit" value="submit">

</form>

@endsection