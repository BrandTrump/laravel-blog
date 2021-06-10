<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function category()
    {
        //hasOne, hasMany, belongsTo, belongsToMany
        return $this->belongsToMany(Category::class)->withPivot('category_id');
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


    public function user()
    {
        //hasOne, hasMany, belongsTo, belongsToMany
        return $this->belongsTo(User::class);
    }

    public function hasComment($post_id)
    {
        //hasOne, hasMany, belongsTo, belongsToMany
        return $this->comment()->where('post_id', $post_id)->count() > 0;
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function getStatusClasses()
    {
        if($this->status->name == 'Draft')
        {
            return 'btn btn-lg btn-primary';
        }
        else
        {
            return 'btn btn-lg btn-success';
        }
    }

}
