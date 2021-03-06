<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = "users";
    protected $fillable = [
        'name',
        'email', 'level',
        'password', 'active','avatar', 'social_id', 
    ];
    protected $guarded = ['*'];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function comment(){
        return $this->hasMany('App\Models\Comment', 'user_id', 'id');
    }

    public function reply(){
        return $this->hasMany('App\Models\Reply', 'user_id', 'id');
    }
    public function like(){
        return $this->hasMany('App\Models\Like', 'user_id', 'id');
    }public function post(){
        return $this->hasMany('App\Models\Post', 'user_id', 'id');
    }
}
