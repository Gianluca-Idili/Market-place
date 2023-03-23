<?php

namespace App\Http\Livewire;

use App\Models\Article;
use Livewire\Component;

class ArticleList extends Component
{
    public $name, $body, $price;

    public function render()
    {
        $articles= Article::where('is_accepted',true)->get();
        return view('livewire.article-list', compact('articles'));
    }
}
