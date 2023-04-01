<?php

namespace App\Http\Livewire;

use App\Models\Article;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class ArticleEditForm extends Component
{
    use WithFileUploads;
public $name;
public $price;
public $image;
public $category_id;
public $body;
public $temporary_images;
public $images = []; 
public $article;
public $old_images;


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

public function update(){
    $this->article->update([
        'name' => $this->name,
        'body' => $this->body,
        'price' => $this->price,
        'image' => $this->image,
        'category_id' => $this->category_id,

    ]);
    return redirect(route('user.profile'))->with('articleUpdate','studente aggiornato');
}


public function mount(){
    $this->name = $this->article->name;
    $this->price = $this->article->price;
    $this->body = $this->article->body;
    $this->category_id = $this->article->category_id;

}
    public function render()
    {
        return view('livewire.article-edit-form');
    }



    public function updatedImages(){
        if($this->validate([
            'old_images.*' => 'image|max:1024'
        ])){
            foreach($this->old_images as $image){
                $this->images[] = Storage::all()->article->images;
            }
        }
    }


    public function removeUpdatedImage($key){
        if(in_array($key,array_keys($this->images))){
            unset($this->images[$key]);
        }
    }




}

