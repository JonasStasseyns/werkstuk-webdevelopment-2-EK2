<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DonationsController extends Controller
{
    public function index($id) {
        $project = DB::table('projects')->where('id', $id)->first();
        return view('donate', compact('project'));
    }
}
