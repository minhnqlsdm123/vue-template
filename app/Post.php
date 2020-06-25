<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable=['name','slug','description','content','category_id','images'];

    protected $table='posts';

    public function category(){
        return $this->belongsTo(Category::class);
    }

}
