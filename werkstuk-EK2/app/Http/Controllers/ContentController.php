<?php

namespace App\Http\Controllers;

use App\Content;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function about() {
        $about = Content::first()->where('page', '=', 'about');
        return view('about', $about);
    }

    public function privacy() {
        $privacy = Content::all()->where('page', '=', 'privacy');
        return view('privacypolicy', compact('privacy'));
//        dd($privacy);
    }

    public function contact(){

    }
}