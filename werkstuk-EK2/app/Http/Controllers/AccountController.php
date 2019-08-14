<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function index() {

        $projects = Project::all()->where('user', '=', Auth::user()->id);

        return view('account', compact('projects'));
    }
}
