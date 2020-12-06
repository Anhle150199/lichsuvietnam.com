<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    use HasFactory;

    protected $table = "period";
    protected $fillable = [
        'name',
    ];

    public function post(){
        return $this->hasMany('App\Models\Post', 'period_id', 'id');
    }
    
}
