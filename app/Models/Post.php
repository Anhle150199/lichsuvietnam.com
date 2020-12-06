<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = "posts";

    protected $fillable = [
        'title', 'content', 'image', 'video', 'views', 'like',
        'user_id', 'category_id', 'period_id', 'post_type_id',
    ];

    public function comment(){
        return $this->hasMany('App\Models\Comment', 'post_id', 'id');
    }

    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function category(){
        return $this->belongsTo('App\Models\Category', 'category_id', 'id');
    }

    public function period(){
        return $this->belongsTo('App\Models\Period', 'period_id', 'id');
    }
    public function post_type(){
        return $this->belongsTo('App\Models\PostType', 'post_type_id', 'id');
    }
}
