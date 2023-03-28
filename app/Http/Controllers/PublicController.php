<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;


class PublicController extends Controller
{
    public function homepage(){
        $articles = Article::where('is_accepted', true)->take(6)->orderBy('created_at','desc')->get();       
        return view('welcome', compact('articles'));
    }
    public function categoryShow(Category $category){
        
        return view('category.show', compact('category'));

    }
    public function searchArticle(Request $request){
        // $category= Category::search($request->searched)->where('is_accepted', true)->paginate(10);
        $articles = Article::search($request->searched)->where('is_accepted', true)->paginate(10);
        return view('welcome', compact('articles'));
    }

    public function setLanguage($lang){
        session()->put('locale',$lang);
        return redirect()->back();
    }
}
