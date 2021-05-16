<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::with(['category', 'author'])->paginate(5);

        return view('posts', compact('posts'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        $posts = Post::query()
            ->leftJoin('users', 'posts.user_id', '=', 'users.id')
            ->where('title', 'LIKE', "%{$search}%")
            ->orWhere('excerpt', 'LIKE', "%{$search}%")
            ->orWhere('body', 'LIKE', "%{$search}%")
            ->orWhere('name', 'LIKE', "%{$search}%")
            ->get();

        return view('search', compact('posts'));
    }
}
