<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use App\Mail\BecomeRevisor;
use Illuminate\Http\Request;
use Ramsey\Uuid\Type\Integer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;

class RevisorController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except('index');
    }
    public function index()
    {
        $article_to_check = Article::where('is_accepted', null)->first();
        // dd($article_to_check->images);
        return view('revisor.index', compact('article_to_check'));
    
    }

    public function acceptArticle(Article $article){
        $article -> setAccepted(true);
        return redirect()->back()->with('message', 'Complimenti hai accettato l\'articolo');
    }

    public function rejectArticle(Article $article){
        $article -> setAccepted(false);
        return redirect()->back()->with('message', 'Hai rifiutato l\'articolo');
    }
    public function becomeRevisor(){
        Mail::to('admin@presto.it')->send(new BecomeRevisor(Auth::user()));
        return redirect()->back()->with('message','richiesta inviata');
    }
    public function makeRevisor( User $user){
        Artisan::call('presto:makeUserRevisor',["email"=>$user->email]);
        return redirect('/')->with('messageRevisor','Benvenuto! Sei stato nominato revisore');
    }
    public function update(){
        $last_article = DB::table('articles')->whereNotNull('is_accepted')->orderBy('id','desc')->first();
        if($last_article){
            DB::table('articles')->where('id', $last_article->id)->update(['is_accepted'=>NULL]);
        }
        return redirect()->back();
    
    }
    public function formRevisor(){
        return view('revisor.form');
    }

    
}
