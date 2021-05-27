{{ Form::open(array('action' => 'App\Http\Controllers\PostsController@submit' ,'method' => 'POST')) }}
<div class="col-md-7 col-lg-8">
    <h4 class="mb-3">Create Blog Post</h4>
    <form class="needs-validation" novalidate>
        <div class="row g-3">
            <div class="form-floating col-sm-6">
                {{ Form::text('title', '', ['class' => 'form-control', 'id' => 'title', 'placeholder'=>'Title']) }}
                <label for="title">Title</label>
            </div>

            <div class="form-floating col-sm-6">
                {{ Form::text('name', '', ['class' => 'form-control', 'id' => 'name', 'placeholder'=>'Category']) }}
                <label for="name">Create new category</label>
            </div>
        </div><br>

        <div>
            <label for ="category_id">Create post in category:</label>
            <select class="form-select form-select-sm mt-3" name="category_id">

                <option value="" selected>Open this select menu</option>

                @foreach ($posts as $post)
                    <option value='{{ $post->category->id }}'>{{ $post->category->name }}</option>
                @endforeach

            </select>
        </div><br>

    {{ Form::textarea('body', '', ['class' => 'form-control', 'placeholder'=>'Content']) }}

</div><br>

{{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}

@csrf

{{ Form::close() }}

@include('inc.messages')