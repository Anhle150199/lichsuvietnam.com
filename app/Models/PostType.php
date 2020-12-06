<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Format extends Model
{
    use HasFactory;
    protected $table = "post_type";

    protected $fillable = [
        'name',
    ];

    public function post()
    {
        return $this->hasMany('App\Models\Post', 'post_type_id', 'id');
    }
}
