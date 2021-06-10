<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\Status;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /*Category::truncate();
        Post::truncate();
        User::truncate();*/

        Status::factory()->create(['name' => 'Draft']);
        Status::factory()->create(['name' => 'Published']);

        $post = Post::factory(7)->create();
        $category = Category::factory(7)->create();

        /*foreach ($category as $category_individual)
        {
            $category_individual->post()->sync($category);
        }*/

        $category->first()->post()->sync($post);

        /*$category->first()->post()->sync($post);*/

       /* $category->post()->sync($post->id);*/

        /* $user = User::factory()->create([
           'name' => 'Jimmy Broadbent'
        ]);

        Post::factory(2)->create([
            'user_id' => $user->id,
        ]);*/

        /*$user = User::factory()->create();

        $personal = Category::create([
           'name' => 'Personal',
           'slug' => 'personal'
        ]);

        $family = Category::create([
            'name' => 'Family',
            'slug' => 'family'
        ]);

        $work = Category::create([
            'name' => 'Work',
            'slug' => 'work'
        ]);

        Post::create([
            'user_id' => $user->id,
           'category_id' => $family->id,
           'title' => 'My Family Post',
           'slug' => 'my-family-post',
           'excerpt' => '<p>Lorem ipsum dolar sit amet</p>',
           'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi viverra vehicula nisl eget blandit. Mauris hendrerit accumsan est.</p>'
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id' => $work->id,
            'title' => 'My Work Post',
            'slug' => 'my-work-post',
            'excerpt' => '<p>Lorem ipsum dolar sit amet</p>',
            'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi viverra vehicula nisl eget blandit. Mauris hendrerit accumsan est.</p>'
        ]);*/
    }
}
