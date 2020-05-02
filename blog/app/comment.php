<?php
namespace App;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;

class comment extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable;
    protected $fillable = [
        'user_id', 'article_id','body','approved',''
    ];
    public function Article(){
        return $this->belongsTo(Article::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

}
