<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['post_author', 'title', 'content', 'post_date','slug','category_id'];
    
    public function category(){
        return $this->belongsTo('App\Category');
    }
}
