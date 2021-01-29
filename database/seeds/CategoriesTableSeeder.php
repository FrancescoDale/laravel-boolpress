<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Category;


class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $new_category = new Category;
        $new_category->name = $faker->words(3, true);

        for ($i = 0; $i < 5; $i++) {

            //generazione slug
            $slug = Str::slug($new_category->name);
            //assegno il valore di slug ad una variabile che poi verrà sovrascritta
            $slug_base = $slug;
            // controlli univocità slug ( se presente )
            $categoria_presente = Category::where('slug', $slug)->first();
            //contatore
            $cont = 1;
            // ciclo che si avvia quando $categoria_presente esiste
            while ($categoria_presente) {
                // generazione nuovo slug con numero del contatore finale
                $slug = $slug_base . '-' . $cont;
                $cont++;
                $categoria_presente = Category::where('slug', $slug)->first();
            }

            // quando lo slug non è presente nel database, ne assegna il valore al campo slug
            $new_category->slug = $slug;
            $new_category->save();
        }

    }
}
