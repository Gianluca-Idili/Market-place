<?php

namespace App\Http\Livewire;

use App\Models\Article;
use Livewire\Component;
use App\Models\Category;
use App\Jobs\RemoveFaces;
use App\Jobs\ResizeImage;
use Livewire\WithFileUploads;
use App\Jobs\GoogleVisionLabelImage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Jobs\GoolgleVisionSafeSearch;


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
        
        $this->validate();
        $this->article = Category::find($this->category_id)->articles()->create($this->validate());
        if(count($this->images)){
            foreach($this->images as $image){
                $newFileName="articles/{$this->article->id}";
                $newImage=$this->article->images()->create(['path'=>$image->store($newFileName, 'public')]);

                $watermark = public_path('media\watermark_Presto.png');

                RemoveFaces::withChain([
                    dispatch(new ResizeImage($newImage->path,500,500)),
                    dispatch (new GoolgleVisionSafeSearch($newImage->id)),
                    dispatch (new GoogleVisionLabelImage($newImage->id)),
                ])->dispatch($newImage->id);
            }
            File::deleteDirectory(storage_path('/app/livewire-tmp'));
        }
            $this->article->user()->associate(Auth::user());
            $this->article->save();
        
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
