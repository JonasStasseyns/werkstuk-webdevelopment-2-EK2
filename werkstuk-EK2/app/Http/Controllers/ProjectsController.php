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

    public function homepage() {
        $projects = Project::all();

        return view('welcome', compact('projects'));
    }

    public function store() {

        $project = new Project;
        $project->title = request('title');
        $project->description = request('description');
        $project->image = request('image');
        $project->save();

        return redirect('/projects');

    }

}
