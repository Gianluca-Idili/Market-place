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
        // 'cover' =>'required',
    ];
    public $name, $price, $body, $article, $category_id, $categories,$cover;

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
