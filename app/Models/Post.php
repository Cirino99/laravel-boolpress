<?php

namespace App\Models;

use App\Traits\Slugger;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use Slugger;

    protected $fillable = ['title', 'content', 'excerpt', 'category_id', 'image', 'slug', 'user_id'];

    protected $hidden = [
        'id', 'created_at', 'updated_at', 'user_id', 'category_id'
    ];

    public function category()
    { // il belongs to sta dalla parte dell'1 della relazione e il nome deve essere singolare
        return $this->belongsTo('App\Models\Category');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag');
    }

    public function user()
    { // il belongs to sta dalla parte dell'1 della relazione e il nome deve essere singolare
        return $this->belongsTo('App\Models\User');
    }
}
