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
        'price' =>'required'
    ];
    public $name, $price, $body, $article, $category_id, $category;

    public function store(){
        $this->validate();
        
        $this->article = Article::create([
            'name' => $this->name,
            'price' => $this->price,
            'body' => $this->body,
            'category_id'=> $this->category_id,
        ]);
        session()->flash('articleCreated', 'hai creato corretamente l\'articolo');
        $this->reset();
    }
    public function mount($category)
    {
        $this->category = Category::all();
    }
    public function render()
    { 
        $this->category->articles;
        return view('livewire.article-create-form');
    }
    
}
