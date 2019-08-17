<?php

namespace App\Http\Controllers;

use App\Donation;
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
            $or = $amount;
            $amount = $amount*0.9;
            $current = $project->current + $amount;
            $project->current += $amount;
            DB::table('projects')->where('id', $id)->update(['current' => $current]);
            $project->donated = true;
            $project->notenough = false;

            $donation = new Donation;
            $donation->user_id = Auth::user()->id;
            $donation->credits = $amount;
            $donation->project_id = $id;
            $donation->save();
            return view('donate', compact('project'));
        }else{
            $project = DB::table('projects')->where('id', $id)->first();
            $project->notenough = true;
            return view('donate', compact('project'));
        }
    }

    public function donationList($id){
        $donations = DB::table('donations')->select('users.name', 'donations.credits')->join('users', 'donations.user_id', '=', 'users.id')->where('project_id', '=', $id)->get();

        return view('projects.donationlist', compact('donations'));
    }
}
