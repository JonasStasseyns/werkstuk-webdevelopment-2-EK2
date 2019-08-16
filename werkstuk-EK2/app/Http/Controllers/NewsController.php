<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(){
        $news = News::paginate(10);

        return view('news.index', compact('news'));
    }
}