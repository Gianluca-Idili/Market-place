<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use App\Models\Category;
use App\Models\Favourite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function preferiti(User $user = NULL){
        //Primo metodo
        // return view('profilo');
        //Secondo metodo SFRUTTARE UNA QUERY AL DATABASE
        if(!$user){
            $favourites = Favourite::all();
            $articles = Article::where('user_id',Auth::id())->orderBy('created_at', 'DESC')->get();
        } else {
            $articles = Article::where('user_id',$user->id)->orderBy('created_at', 'DESC')->get();
        }

        //$QUERY-->WHERE-->ORDERBY
        return view('user.preferiti', compact('articles', 'favourites'));
        //TUTTI I RECORD->PRENDO SOLO QUELLI DELL'UTENTE LOGGATO-->ORDINO
    }
    public function __construct(){
        
        $this->middleware('auth')->except('index');
    }
    
    public function addFavorite(Request $request)
{
    
    $request->validate([
        'article_id' => 'required|exists:articles,id',
    ]);

    $user_id = Auth::id();
    $article_id = $request->input('article_id');

    $favourite = Favourite::where('user_id', $user_id)
        ->where('article_id', $article_id)
        ->first();

    if (!$favourite) {
        $favourite = new Favourite;
        $favourite->user_id = $user_id;
        $favourite->article_id = $article_id;
        $favourite->save();
    }

    return redirect()->back()->with('message', 'Articolo aggiunto ai preferiti');
}


public function destroyFavorite(Request $request)
{
    $user_id = Auth::id();
    $article_id = $request->input('article_id');
    $favourite = Favourite::where('user_id', $user_id)
        ->where('article_id', $article_id)
        ->first();
    // $article_id = $request->input('article_id');

    $user = Auth::user();
    // $user->favourites()->delete($article_id);
    $favourite->delete();
    return redirect()->back();
}
    
    
    /**
    * Display a listing of the resource.
    */
    public function index(){
    $articles = DB::table('articles')->paginate(6);
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
        $article->delete();
        return redirect(route('homepage'))->with('articleDel', 'articolo eliminato');
    }
    
}    