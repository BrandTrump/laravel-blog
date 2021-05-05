<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function search(Request $request)
    {
        $search = $request->input('search');

        $posts = Post::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->orWhere('excerpt', 'LIKE', "%{$search}%")
            ->orWhere('body', 'LIKE', "%{$search}%")
            ->get();

        return view('posts', compact('posts'));
    }
}
