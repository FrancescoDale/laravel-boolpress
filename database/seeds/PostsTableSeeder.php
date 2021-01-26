<?php

use Illuminate\Database\Seeder;
use App\Post;
use Faker\Generator as Faker;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 10; $i++) {
            $new_post_object = new Post();
            $new_post_object->title = $faker->sentence(1);
            $new_post_object->body = $faker->sentence(10);
            //generazione slug
            $slug->slug = Str::slug($new_post_object->title);

            $new_post_object->slug = $slug;
            $new_post_object->save();
        }
    }
}
