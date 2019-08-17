<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    public function comment($type, $id){
        $comment = new Comment;
        $comment->username = Auth::user()->name;
        $comment->content_type = $type;
        $comment->content_id = $id;
        $comment->comment = request('comment');
        $comment->save();
        return redirect('/projects/'.$id);
    }
}
