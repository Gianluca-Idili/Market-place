<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function homepage(){
        $articles =Article::take(6)->orderBy('created_at','desc')->get();
        
        return view('welcome', compact('articles'));
    }
    public function categoryShow(Category $category){
        
        return view('category.show', compact('category'));

    }

    
}
