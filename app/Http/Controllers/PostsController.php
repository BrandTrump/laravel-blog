<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Str;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::with('category')->orderBy('created_at', 'desc')->paginate(7);

        return view('posts', compact('posts'));
    }

    public function showCategories(Category $category)
    {
        return view('posts', [
            'posts' => $category->post()->orderBy('created_at', 'desc')->paginate(7),
        ]);
    }

    public function showAuthor(User $author)
    {
        return view('posts', [
            'posts' => $author->post()->orderBy('created_at', 'desc')->paginate(7),
        ]);
    }

    public function showCreate()
    {
        $posts = Post::with('category')->orderBy('created_at', 'desc')->get()->unique('category_id');

        return view('post-creation', compact('posts'));
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

    public function submit(Request $request)
    {
        $this->validate($request, array(
            'title' => 'required|unique:posts,title',
            'category_name' => 'required_without:category_id|unique:categories,category_name',
            'body' => 'required|min:5|max:5000',
        ));

        if (isset($request->name))
        {
            $category = new Category();

            $category->category_name = $request->name;
            $category->slug = Str::slug($request->name, '-');
            $category->created_at = Carbon::now()->format('Y-m-d H:i:s');
            $category->save();
        }

        if (!isset($request->name))
        {
            $post = new Post();

            $post->user_id = Auth::user()->id;
            $post->title = $request->title;
            $post->body = $request->body;
            $post->slug = Str::slug($request->title, '-');
            $post->excerpt = Str::words($post->body, 10);
            $post->created_at = Carbon::now()->format('Y-m-d H:i:s');
            $post->save();

            $post->category()->sync($request->category_id);
        }
        else
        {
            $post = new Post();

            $post->user_id = Auth::user()->id;
            $post->title = $request->title;
            $post->body = $request->body;
            $post->slug = Str::slug($request->title, '-');
            $post->excerpt = Str::words($post->body, 10);
            $post->created_at = Carbon::now()->format('Y-m-d H:i:s');
            $post->save();

            $post->category()->sync($category , $request->category_id);
        }



        /*return response()->json(null, 200);*/

        return redirect('/')->with('success', 'Comment Added');

    }
}