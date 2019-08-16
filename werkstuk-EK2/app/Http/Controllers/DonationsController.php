<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DonationsController extends Controller
{
    public function index($id) {
        $project = DB::table('projects')->where('id', $id)->first();
        $project->donated = false;
        $project->notenough = false;
        return view('donate', compact('project'));
    }

    public function donate($id, $amount){
        if(Auth::user()->credits >= $amount) {
            $project = DB::table('projects')->where('id', $id)->first();
            Auth::user()->credits -= $amount;
            Auth::user()->save();
            $current = $project->current + $amount;
            $project->current += $amount;
            DB::table('projects')->where('id', $id)->update(['current' => $current]);
            $project->donated = true;
            $project->notenough = false;
            return view('donate', compact('project'));
        }else{
            $project = DB::table('projects')->where('id', $id)->first();
            $project->notenough = true;
            return view('donate', compact('project'));
        }
    }
}
