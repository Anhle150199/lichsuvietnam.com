<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;

    protected $table = "replies";

    protected $fillable = [
        'content', 'comment_id', 'user-id', 'hidden',
    ];

    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function comment(){
        return $this->belongsTo('App\Models\Comment', 'comment_id', 'id');
    }
}
