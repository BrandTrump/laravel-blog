<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function category()
    {
        //hasOne, hasMany, belongsTo, belongsToMany
        return $this->belongsTo(Category::class);
    }

    public function comment()
    {
        //hasOne, hasMany, belongsTo, belongsToMany
        return $this->hasMany(Comment::class);
    }

    public function author()
    {
        //hasOne, hasMany, belongsTo, belongsToMany
        return $this->belongsTo(User::class, 'user_id');
    }

    /*public function user()
    {
        //hasOne, hasMany, belongsTo, belongsToMany
        return $this->belongsTo(User::class);
    }*/

    public function hasComment($post_id)
    {
        //hasOne, hasMany, belongsTo, belongsToMany
        return $this->comment()->where('post_id', $post_id)->count() > 0;
    }



}
