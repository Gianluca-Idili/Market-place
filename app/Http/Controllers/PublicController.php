<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Article;
use App\Models\Category;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class PublicController extends Controller
{
    public function homepage(){
        $articles = Article::where('is_accepted', true)
                    ->orderBy('created_at','desc')
                    ->paginate(4);       
        return view('welcome', ['articles' => $articles]);
    }
    public function categoryShow(Category $category){
        
        return view('category.show', compact('category'));

    }
    public function searchArticle(Request $request){
        // $category= Category::search($request->searched)->where('is_accepted', true)->paginate(10);
        $articles = Article::search($request->searched)->where('is_accepted', true)->paginate(8);
        return view('welcome', compact('articles'));
    }

    public function setLanguage($lang){
        session()->put('locale',$lang);
        return redirect()->back();
    }

    public function contact_us(){
        return view('contact_us');
    }

    public function contact_us_submit(Request $request ){
        $name = $request->name;
       $email = $request->email;
       $message = $request->message;
       $user_data= compact('name', 'email', 'message');
       
       try{
       Mail::to($email)->send(new ContactMail($user_data));
     } catch(Exception $e){
        return redirect()->back()->with('emailError', 'E\' sorto un errore con l\'invio della mail, riprova più tardi');
     }
  
       return redirect(route('homepage'))->with ('statusEmail','Email inviata, grazie per averci contattato');
  
     }


    
}
