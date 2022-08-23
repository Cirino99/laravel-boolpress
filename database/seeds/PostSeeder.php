<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\File;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $categories_ids = Category::all()->pluck('id');
        $users_ids = User::all()->pluck('id');

        for ($i = 0; $i < 150; $i++) {
            $post = new Post;
            $post->title = $faker->words(rand(2, 4), true);
            $post->user_id = $faker->randomElement($users_ids);
            $post->category_id = $faker->randomElement($categories_ids);
            $post->slug = Post::getSlug($post->title);
            $contents = new File(__DIR__ . '/../../storage/app/imageRandom/img' . rand(1, 15) . '.jpg');
            $post->image = Storage::put('uploads', $contents);
            $post->content = $faker->paragraphs(rand(2, 10), true);
            $post->excerpt = $faker->paragraph();
            $post->save();
        }
    }
}
