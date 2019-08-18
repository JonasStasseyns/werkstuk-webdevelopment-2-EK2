<?php

namespace App\Http\Controllers;

use App\Project;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AccountController extends Controller
{
    public function index() {

        $projects = Project::all()->where('user', '=', Auth::user()->id);
        $donations = DB::table('donations')->select('projects.title', 'donations.credits', 'projects.id')->join('projects', 'projects.id', '=', 'donations.project_id')->where('user_id', '=', Auth::user()->id)->get();
//        dd(Auth::user());
        return view('account', compact(['projects', 'donations']));
    }

    public function updateImage(){
        $image = request()->image->store('uploads', 'public');

        $user = Auth::user();
        $user->image = $image;
        $user->save();

        return redirect('/account');
    }

    public function updateEmail(){
        $email = request('email');
        $user = Auth::user();
        $user->email = $email;
        $user->save();
        return redirect('/account');
    }
}
