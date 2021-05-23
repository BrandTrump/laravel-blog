<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use MongoDB\Driver\Session;


class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        if(Auth::user()) {
            $this->validate($request, array(
                'body' => 'required|min:5|max:5000',
            ));

            $comment = new Comment;
            $comment->user_id = optional(Auth::user())->id;
            $comment->post_id = $request->post_id;
            $comment->parent_id = $request->parent_id;
            $comment->body = $request->body;

            $comment->save();

            //Session::flash('success','Comment was added');

            return redirect()->back()->with('success', 'Comment Added');
        }
        else {
            $this->validate($request, array(
                'firstname' => 'required|min:2|max:50',
                'lastname' => 'required|min:2|max:50',
                'body' => 'required|min:5|max:5000',
            ));

            $comment = new Comment;
            $comment->name = $request->firstname . ' ' . $request->lastname;
            $comment->user_id = optional(Auth::user())->id;
            $comment->post_id = $request->post_id;
            $comment->body = $request->body;
            $comment->save();

            //Session::flash('success','Comment was added');

            return redirect()->back()->with('success', 'Comment Added');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
