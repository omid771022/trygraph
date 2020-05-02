<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;
use Laravel\Passport\HasApiTokens;

class User extends Model implements AuthenticatableContract, AuthorizableContract
{
    use HasApiTokens, Authenticatable, Authorizable;


    protected $fillable = [
        'name', 'email','password','admin',
    ];

    protected $hidden = [
        'password',
    ];
    public function articles(){
        return $this->hasMany(Article::class);
    }
    public function comments(){
        return $this->hasMany(comment::class);
    }
}
