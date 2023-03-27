<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{    
   
   
    public function profile(User $user = NULL){
        //Primo metodo
        // return view('profilo');
        //Secondo metodo SFRUTTARE UNA QUERY AL DATABASE
        if(!$user){
            $articles = Article::where('user_id',Auth::id())->orderBy('created_at', 'DESC')->get();
        } else {
            $articles = Article::where('user_id',$user->id)->orderBy('created_at', 'DESC')->get();
        }

        //$QUERY-->WHERE-->ORDERBY
        return view('user.profile', compact('articles'));
        //TUTTI I RECORD->PRENDO SOLO QUELLI DELL'UTENTE LOGGATO-->ORDINO
    }

    public function avatar(User $user, UserRequest $request){
        $user->update([
            'avatar' => $request->file('avatar')->store('public/avatars'),
        ]);
        return redirect()->back()->with('avatarChange', 'Hai cambiato con successo la tua foto profilo!');
    }
    public function destroy(){
        $user_articles= Auth::user()->articles;

        foreach($user_articles as $article){
            $article->update([
                'user_id' =>1
            ]);
          }
        

        Auth::user()->delete();
        return redirect(route('homepage'))->with('userDeleted', 'utente rimosso');
    }
}
