<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'price',
        'body',
        'category_id',
    ];

    public function category(){
        $this->belongsTo(Category::class);
    }
}
