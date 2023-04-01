<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    public function __construct(){
        
        $this->middleware('auth')->except('index');
    }
    
    
    
    /**
    * Display a listing of the resource.
    */
    public function index(){
    $articles = DB::table('articles')->paginate(10);
        return view('article.index', compact('articles'));
    }
    
    /**
    * Show the form for creating a new resource.
    */
    public function create()
    {
        
        return view('article.create');
    }
    
    /**
    * Store a newly created resource in storage.
    */
    // public function store(Request $request)
    // {
        //     
        // }
        
        /**
        * Display the specified resource.
        */
        public function show(Article $article)
        {
            return view('article.show', compact('article'));
        }
        
        /**
        * Show the form for editing the specified resource.
        */
        public function edit(Article $article)
        {
            return view('article.edit', compact('article'));
        }
        
        /**
        * Update the specified resource in storage.
        */
        public function update(Request $request, Article $article)
        {
            //
        }
        
        /**
        * Remove the specified resource from storage.
        */
        public function destroy(Article $article)
        {
            //
        }
    }
    