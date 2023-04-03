<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Favourite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function index()
    {
        $user_id = Auth::id();
        // $favourites = Favourite::where('user_id', $user_id)->get();
        $favourites = Favourite::where('user_id', auth()->id())->get();
        $articles = [];

        foreach ($favourites as $favorite) {
            $article = Article::where('id', $favorite->article_id)->first();
            if ($article) {
                $articles[] = $article;
            }
        }
        return view('favourites', compact('articles'));
    }

    public function add(Request $request)
    {
        $user_id = Auth::id();
        $article_id = $request->input('article_id');

        $favorite = Favourite::where('user_id', $user_id)
            ->where('article_id', $article_id)
            ->first();

        if (!$favorite) {
            $favorite = new Favourite;
            $favorite->user_id = $user_id;
            $favorite->article_id = $article_id;
            $favorite->save();
        }

        return redirect()->back()->with('message', 'Articolo aggiunto ai favourites');
    }
}
