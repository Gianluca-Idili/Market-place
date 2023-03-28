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

    

    protected $rules = [
        'name' =>'required|min:4',
        'body' =>'required|min:10',
        'price' =>'required|numeric',
        'category_id' => 'required',
        'temporary_images.*' => 'image|max:1024',
        'images' => 'image|max:1024'
    ];
    protected $messages = [
        'temporary_images.*.image' => 'richiesta un immagine',
        'temporary_images.*.max' => 'la dimensione massima dell\'immagine è 1mb',
        'images.image' => 'richiesta un immagine',
        'image.max' => 'la dimensione massima dell\'immagine è 1mb',
    ];

    public $name, $price, $body, $article, $category_id, $categories, $image, $temporary_images;
    public $images = []; 

    public function updateTemporaryImage(){
        if($this->validate([
            'temporary_images.*' => 'image|max:1024',
        ])){
            foreach($this->temporary_images as $image){
                $this->images[] = $image;
            }
        }
    }
    public function store(){

        $this->validate();
        $article = $this->article =Auth::user()->articles()->create([
            'name' => $this->name,
            'price' => $this->price,
            'body' => $this->body,
            'category_id'=> $this->category_id,
            // 'cover'=>$this->cover->store('public/covers'),
        ]);
        $this->clearForm();
        
        
        
        session()->flash('articleCreated', 'hai creato corretamente l\'articolo');      
    }

    public function clearForm(){
        $this->name = '';
        $this->price = '';
        $this->body = '';
        $this->category_id = '';
        // $this->cover= '';
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
