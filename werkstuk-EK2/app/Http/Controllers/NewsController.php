<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public function index(){
        $news = News::paginate(10);

        return view('news.index', compact('news'));
    }

    public function detail($id){
        $news = DB::table('news')->where('id', $id)->first();
        $comments = DB::table('comments')->where([
            ['content_type', '=', 'news'],
            ['content_id', '=', $id],
        ])->get();

        return view('news.detail', compact(['news', 'comments']));
    }
}
