<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    @foreach ($projects as $project)

        <h2>{{$project->username}}</h2>
        <p>{{$project->password}}</p>

    @endforeach
</body>
</html>