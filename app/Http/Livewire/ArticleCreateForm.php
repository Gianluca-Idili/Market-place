<?php

namespace App\Http\Livewire;

use App\Models\Article;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;

class ArticleCreateForm extends Component
{
    use WithFileUploads;

    public $name, $price, $body, $article, $category_id, $categories,  $image, $temporary_images;
    public $images = []; 

    protected $rules = [
        'name' =>'required|min:4',
        'body' =>'required|min:10',
        'price' =>'required|numeric',
        'category_id' => 'required',
        'temporary_images.*' => 'image|max:1024',
        'images.*' => 'image|max:1024'
    ];
    protected $messages = [
        'temporary_images.*.image' => 'richiesta un immagine',
        'temporary_images.*.max' => 'la dimensione massima dell\'immagine è 1mb',
        'images.image' => 'richiesta un immagine',
        'images.max' => 'la dimensione massima dell\'immagine è 1mb',
    ];



    public function updatedTemporaryImages(){
        if($this->validate([
            'temporary_images.*' => 'image|max:1024'
        ])){
            foreach($this->temporary_images as $image){
                $this->images[] = $image;
            }
        }
    }

    public function removeImage($key){
        if(in_array($key,array_keys($this->images))){
            unset($this->images[$key]);
        }
    }

    public function store(){
        // $this->article->user()->associate(Auth::user());
        //         $this->article->save();
        $this->validate();
        $this->article = Category::find($this->category_id)->articles()->create($this->validate());
        if(count($this->images)){
            foreach($this->images as $image){
                $this->article->images()->create(['path'=>$image->store('images', 'public')]);
            }
        }

        // $article = $this->article =Auth::user()->articles()->create([
        //     'name' => $this->name,
        //     'price' => $this->price,
        //     'body' => $this->body,
        //     'category_id'=> $this->category_id,
        // ]);
        return redirect(route('homepage'))->with('articleCreated', 'Hai creato corretamente l\'articolo');      
        $this->clearForm();       
    }

    public function clearForm(){
        $this->name = '';
        $this->price = '';
        $this->body = '';
        $this->category_id = '';
        $this->images= [];
        $this->temporary_images = [];
    }

    public function mount()
    {
        $this->categories = Category::all();
    }
    

    public function render()
    { 
        return view('livewire.article-create-form');           
    }
    
}
