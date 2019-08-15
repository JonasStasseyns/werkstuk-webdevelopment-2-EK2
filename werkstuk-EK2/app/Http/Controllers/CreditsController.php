<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class CreditsController extends Controller
{
    public function index(){
        $user = Auth::user();

        return view('credits', compact('user'));
    }

    public function purchase($amount) {
        $user = Auth::user();
        $user->credits += $amount;
        $user->save();

        return redirect('/credits');
    }
}
