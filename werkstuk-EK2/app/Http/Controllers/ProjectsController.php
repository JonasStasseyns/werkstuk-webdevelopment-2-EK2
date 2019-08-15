<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class ProjectsController extends Controller
{
    //

    public function index() {
         $projects = Project::paginate(10);

         return view('projects.index', compact('projects'));
    }

    public function create() {

        return view('projects.create');

    }

    public function homepage() {
        $projects = Project::limit(2)->get();

        return view('welcome', compact('projects'));
    }

    public function store() {

        $project = new Project;
        $project->title = request('title');
        $project->description = request('description');
        $project->image = request()->image->store('uploads', 'public');
        $project->user = request('user');
        $project->save();


        return redirect('/projects');

    }

}
