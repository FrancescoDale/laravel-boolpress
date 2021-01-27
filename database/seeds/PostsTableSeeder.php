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
            $new_post_object->title = $faker->sentence(2);
            $new_post_object->body = $faker->text(250);
            //generazione slug
            $slug = Str::slug($new_post_object->title);
            //assegno il valore di slug ad una variabile che poi verrà sovrascritta
            $slug_base = $slug;
            // controlli univocità slug ( se presente )
            $post_object_presente = Post::where('slug', $slug)->first();
            //contatore
            $cont = 1;
            // ciclo che si avvia quando $post_object_presente esiste
            while ($post_object_presente) {
                // generazione nuovo slug con numero del contatore finale
                $slug = $slug_base . '-' . $cont;
                $cont++;
                $post_object_presente = Post::where('slug', $slug)->first();
            }

            // quando lo slug non è presente nel database, ne assegna il valore al campo slug
            $new_post_object->slug = $slug;
            $new_post_object->save();
        }
    }
}
