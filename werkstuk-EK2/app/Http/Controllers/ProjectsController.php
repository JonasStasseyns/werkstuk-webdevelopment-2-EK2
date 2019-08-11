<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class ProjectsController extends Controller
{
    //

    public function index() {
         $projects = Project::all();

         return view('projects.index', compact('projects'));
    }

    public function create() {

        return view('projects.create');

    }

    public function store() {

        $project = new Project;
        $project->username = request('name');
        $project->password = request('password');
        $project->save();

        return redirect('/projects');

    }

}
