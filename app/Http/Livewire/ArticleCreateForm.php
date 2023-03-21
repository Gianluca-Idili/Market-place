<?php

namespace App\Http\Livewire;

use App\Models\Article;
use Livewire\Component;

class ArticleCreateForm extends Component
{
    protected $rules = [
        'name' =>'required|min:4',
        'body' =>'required|min:10',
        'price' =>'required'
    ];
    public $name, $price, $body, $article;

    public function store(){
        $this->validate();
        $this->article = Article::create([
           'name' => $this->name,
           'price' => $this->price,
           'body' => $this->body,
        ]);
        session()->flash('articleCreated', 'hai creato corretamente l\'articolo');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.article-create-form');
    }
}
