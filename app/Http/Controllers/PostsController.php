<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
        $posts = Post::orderBy('created_at', 'desc')->with(['category', 'author'])->paginate(7);

        return view('posts', compact('posts'));
    }

    public function showCategories(Category $category)
    {
        return view('posts', [
            'posts' => $category->post()->paginate(7),
        ]);
    }

    public function showAuthor(User $author)
    {
        return view('posts', [
            'posts' => $author->post()->paginate(7),
        ]);
    }

    public function showCreate()
    {
        $posts = Post::orderBy('created_at', 'desc')->with(['category', 'author'])->get()->unique('category_id');

        return view('post-creation', compact('posts'));
    }

    public function checkExist()
    {
        $name = request()->get('name');
        $category = new Category();
        $where = ['id' => $name];
        return $category->where($where)->get()->count() > 0;
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
            'name' => 'required_without:category_id|unique:categories,name',
            'body' => 'required|min:5|max:5000',
        ));

        if (isset($request->name))
        {
            $category = new Category();

            $category->name = $request->name;
            $category->slug = Str::slug($request->name, '-');
            $category->created_at = Carbon::now()->format('Y-m-d H:i:s');
            $category->save();
        }

        if($request->category_id == null)
        {
            $post = new Post();

            $post->user_id = Auth::user()->id;
            $post->category_id = $category->id;
            $post->title = $request->title;
            $post->body = $request->body;
            $post->slug = Str::slug($request->title, '-');
            $post->excerpt = Str::words($post->body, 10);
            $post->created_at = Carbon::now()->format('Y-m-d H:i:s');
            $post->save();
        }
        else
        {
            $post = new Post();

            $post->user_id = Auth::user()->id;
            $post->category_id = $request->category_id;
            $post->title = $request->title;
            $post->body = $request->body;
            $post->slug = Str::slug($request->title, '-');
            $post->excerpt = Str::words($post->body, 10);
            $post->created_at = Carbon::now()->format('Y-m-d H:i:s');
            $post->save();
        }

        /*return response()->json(null, 200);*/

        return redirect('/')->with('success', 'Comment Added');

    }
}
