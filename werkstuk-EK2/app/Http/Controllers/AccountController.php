<?php

namespace App\Http\Controllers;

use App\Project;
use App\User;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function index() {

        $projects = Project::all()->where('user', '=', Auth::user()->id);

        return view('account', compact('projects'));
    }

    public function updateImage(){
        $image = request()->image->store('uploads', 'public');

        $user = Auth::user();
        $user->image = $image;
        $user->save();
    }
}
