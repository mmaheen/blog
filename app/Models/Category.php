<?php

namespace App\Models;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable=[
        'name',
        'status'
    ];

    public function post(){
        return $this->hasMany(Post::class);
    }
}
