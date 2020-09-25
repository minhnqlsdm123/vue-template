<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable=['name','slug','image'];

    protected $table= 'categories';

    public function post(){
        return $this->hasOne(Post::class);
    }
}
