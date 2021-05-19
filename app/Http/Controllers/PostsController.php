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
        $posts = Post::orderBy('created_at', 'desc')->with(['category', 'author'])->paginate(5);

        return view('posts', compact('posts'));
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
            'title' => 'required',
            'name' => 'required',
            'body' => 'required|min:5|max:5000',
        ));

        $category = new Category();

        $category->name = $request->name;
        $category->slug = Str::slug($request->name, '-');
        $category->created_at = Carbon::now()->format('Y-m-d H:i:s');
        $category->save();

        $post = new Post();

        $post->user_id = Auth::user()->id;
        $post->category_id = $category->id;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->slug = Str::slug($request->title, '-');
        $post->excerpt = Str::words($post->body, 10);
        $post->created_at = Carbon::now()->format('Y-m-d H:i:s');
        $post->save();

        return response()->json(null, 200);

    }
}
