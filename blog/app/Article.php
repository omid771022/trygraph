<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;
class Article extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable;
    protected $fillable = [
'user_id', 'title','body'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function Comments()
    {
        return $this->hasMany(comment::class);
    }


}
