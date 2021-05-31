{{ Form::open(array('action' => 'App\Http\Controllers\CommentController@store' ,'method' => 'POST')) }}
@csrf

{{ Form::hidden('post_id', $post->id) }}

{{ Form::hidden('parent_id', $comment->id) }}

<textarea class="form-control" rows="3" name ="body"></textarea>

<br><button type="submit" class="btn btn-primary">Reply</button>

{{ Form::close() }}
