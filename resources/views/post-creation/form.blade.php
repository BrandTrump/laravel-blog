{{ Form::open(array('action' => 'App\Http\Controllers\PostsController@submit' ,'method' => 'POST')) }}
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <label>Title</label>
                <div class="input-group mb-4">
                    <input class="form-control" placeholder="" id="title"  name="title" aria-label="title" type="text" >
                </div>
            </div>
            <div class="col-md-6 ps-2">
                <label>Create New Category</label>
                <div class="input-group">
                    <input type="text" class="form-control" name="name" id="name" placeholder="" aria-label="name" >
                </div>
            </div>
        </div>
        <div class="mb-4">
            <label>Add to existing category</label>
            <div class="input-group">
                <select class="form-select form-select-sm mt-3" name="category_id">

                    <option value="" selected>Open this select menu</option>

                    @foreach ($posts as $post)
                        <option value='{{ $post->category->id }}'>{{ $post->category->name }}</option>
                    @endforeach

                </select>
            </div>
        </div>
        <div class="form-group mb-4">
            <label>Content</label>
            <textarea name="body" class="form-control" id="body" rows="4"></textarea>
        </div>
        <div class="bg">
            <div class="col-md-12">
                <button type="submit" class="btn text-white w-100">Create Post</button>
            </div>
        </div>
    </div>
@csrf

{{ Form::close() }}

@include('inc.messages')