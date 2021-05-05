<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Seeder;
use App\Models\User;

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

        Post::factory(2)->create();

        $user = User::factory()->create([
           'name' => 'Jimmy Broadbent'
        ]);

        Post::factory(2)->create([
            'user_id' => $user->id
        ]);

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
