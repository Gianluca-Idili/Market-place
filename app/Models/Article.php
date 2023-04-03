<?php

namespace App\Models;

use App\Models\User;
use App\Models\Image;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Article extends Model
{
    use HasFactory, Searchable;
    protected $fillable = [
        'name',
        'price',
        'body',
        'category_id',
        'user_id',
        'cover',
    ];

    public function toSearchableArray()
    {
      $category = $this->category->name;
      $array= [
        'id' => $this->id,
        'name' => $this->name,
        'body' => $this->body,
        'category' => $category,
      ];
      return $array;
    }

    public function category(){
      return $this->belongsTo(Category::class);
        
    }

    public function user(){
      return  $this->belongsTo(User::class);
    }
    public static function toBeRevisionedCount()
    {
      return Article::where('is_accepted', null)->count();
    }
    public function setAccepted($value){

        $this->is_accepted = $value;
        $this->save();
        return true;
    }

    public function images(){
      return $this->hasMany(Image::class);
    }
    
    public function favouritedBy()
{
    return $this->belongsToMany(User::class, 'favourites');
}


}
