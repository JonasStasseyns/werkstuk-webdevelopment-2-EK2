<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('admin.index', compact('categories'));
    }

    public function deleteCategory($id){
        DB::table('categories')->where('id', '=', $id)->delete();
        return redirect('/admin');
    }

    public function addCategory(){
        $cat = new Category;
        $cat->category = request('category');
        $cat->save();
        return redirect('/admin');
    }
}
