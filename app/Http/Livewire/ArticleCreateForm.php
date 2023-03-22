<?php

namespace App\Http\Livewire;

use App\Models\Article;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class ArticleCreateForm extends Component
{
    protected $rules = [
        'name' =>'required|min:4',
        'body' =>'required|min:10',
        'price' =>'required',
        'category_id' => 'required',
    ];
    public $name, $price, $body, $article, $category_id, $categories;

    public function store(){
        $this->validate();
        
      $article = $this->article = Article::create([
            'name' => $this->name,
            'price' => $this->price,
            'body' => $this->body,
            'category_id'=> $this->category_id,
        ]);
        Auth::user()->articles()->save($article);
        
        session()->flash('articleCreated', 'hai creato corretamente l\'articolo');
        $this->reset();
    }

    public function mount()
    {
        $this->categories = Category::pluck('name', 'id');
    }
    

    public function render()
    { 
        return view('livewire.article-create-form', [
            'categories' => $this->categories,
        ]);           
    }
    
}
