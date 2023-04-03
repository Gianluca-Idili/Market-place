<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use App\Models\Favourite;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{    
   
   
    public function profile(User $user = NULL){
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
        return view('user.profile', compact('articles', 'favourites'));
        //TUTTI I RECORD->PRENDO SOLO QUELLI DELL'UTENTE LOGGATO-->ORDINO
    }

    public function avatar(User $user, UserRequest $request){
        $user->update([
            'avatar' => $request->file('avatar')->store('public/avatars'),
        ]);
        return redirect()->back()->with('avatarChange', 'Hai cambiato con successo la tua foto profilo!');
    }

    public function edit()
        {
            
            return view('user.edit', ['user' => Auth::user()]);
        }

        public function update(UserRequest $request)
        {
            $user = Auth::user();
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'avatar' => ['nullable', 'image', 'max:1024'],

            ]);
            $user->name = $request->input('name');
            if($request->hasFile('avatar')){
                $avatar = $request->file('avatar')->store('public/avatars');
                if($user->avatar && $user->avatar !== null){

                    Storage::delete($user->avatar);
                }
                $user->avatar = $avatar;
            }
            $user->save();
            return redirect(route('user.profile'))->with('userUpdated', 'hai modificato corretamente il tuo profilo');
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
