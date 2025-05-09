<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable=[
        'name',
        'description',
        'photo'

    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
