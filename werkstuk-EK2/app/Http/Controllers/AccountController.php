<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AccountController extends Controller
{
    public function index() {

        $projects = Project::all()->where('user', '=', Auth::user()->id);

        return view('account', compact('projects'));
    }
}
