<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Comment extends Model
{
    use HasFactory;

    public function post()
    {
        //hasOne, hasMany, belongsTo, belongsToMany
        return $this->belongsTo(Post::class);
    }

    public function user()
    {
        //hasOne, hasMany, belongsTo, belongsToMany
        return $this->belongsTo(User::class, 'user_id');
    }

    // Figure out how to get commenter name
    public function getCommenterName()
    {
        // If user is logged in (user_id present), then return name of user from User model
        if($this->user_id)
        {
            return $this->user->name;
//            return $this->belongsTo(User::class, 'user_id');
        }
        else
        {
            // If user was not logged in, return the name of commenter from Comment model
//            return $this->belongsTo(Comment::class, 'id');

            return $this->name;
        }

    }

    public function getCommenterAvatar()
    {
        if($this->user_id)
        {
            return $this->user->avatar;
        }
        else
        {
            return '0cf0ca2ac23fbc36cf58434da4a47089.png';
        }
    }

    public function author()
    {
        //hasOne, hasMany, belongsTo, belongsToMany
        return $this->belongsTo(User::class, 'user_id');
    }

  /*  public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }*/

}
