<?php

namespace App\Http\Controllers;

use App\Category;
use App\Featured;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use App\Project;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProjectsController extends Controller
{
    //

    public function index()
    {
        $projects = Project::paginate(9);
        $categories = Category::all();
        return view('projects.index', compact(['projects', 'categories']));
    }

    public function detail($id)
    {
        $project = DB::table('projects')->where('id', $id)->first();
        $comments = DB::table('comments')->where([
            ['content_type', '=', 'project'],
            ['content_id', '=', $id],
        ])->get();
        $duration = DB::table('featureds')->where('project_id', '=', $id)->first();

        return view('projects.detail', compact(['project', 'comments', 'duration']));
    }

    public function create()
    {
        $categories = Category::all();
        return view('projects.create', compact('categories'));
    }

    public function homepage()
    {
        $projects = DB::table('featureds')->select('projects.id', 'projects.title', 'projects.description', 'projects.image')->join('projects', 'featureds.project_id', '=', 'projects.id')->get();
        return view('welcome', compact('projects'));
    }

    public function category($cat)
    {
        $projects = DB::table('projects')->where('category', $cat)->paginate(9);
        $category = $cat;
        return view('projects.index', compact(['projects', 'category']));
    }

    public function edit($id){
        $project = DB::table('projects')->where('id', $id)->first();
        $editmode = true;
        $categories = Category::all();
        return view('projects.detail', compact(['project', 'editmode', 'categories']));
    }

    public function update(){
        $project = [
            'title' => request('title'),
            'description' => request('description'),
            'content' => request('content'),
            'category' => request('category'),
            'target' => request('target'),
        ];

        if(request()->hasFile('image')){
            $project['image'] = request()->image->store('uploads', 'public');
        }

        DB::table('projects')->where('id', request('id'))->update($project);

        return redirect('/projects/'.request('id'));
    }

    public function store()
    {
        $project = new Project;
        $project->title = request('title');
        $project->target = request('target');
        $project->description = request('description');
        $project->content = request('content');
        $project->image = request()->image->store('uploads', 'public');
        $project->user = request('user');
        $project->category = request('category');
        $project->deadline = request('deadline');
        $project->save();

        return redirect('/projects/'.$project->id);
    }

    public function featurizeIndex($id){
        return view('projects.feature', compact('id'));
    }

    public function featurize(){
        $featured = new Featured;
        $featured->project_id = request('id');
        $featured->duration = request('days');
        $featured->paid_credits = 100*request('days');
        $featured->save();
        Auth::user()->credits -= $featured->paid_credits;
        Auth::user()->save();
        return redirect('/projects/'.request('id'));
    }

    public function pdf($id){
        $project = DB::table('projects')->where('id', $id)->first();
        $pdf = PDF::loadView('projects.pdf', compact('project'));

        return $pdf->download(str_replace(' ', '_', $project->title).'.pdf');
    }
}
