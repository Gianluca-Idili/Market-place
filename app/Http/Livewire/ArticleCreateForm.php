<?php

namespace App\Http\Livewire;

use App\Models\Article;
use Livewire\Component;

class ArticleCreateForm extends Component
{
    public $name, $price, $body, $article;

    public function store(){
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
