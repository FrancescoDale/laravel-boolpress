<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'posts' => Post::all()
        ];
        return view('admin.posts.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'categories' => Category::all(),
            'tags' => Tag::all()
        ];
        return view('admin.posts.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $form_data = $request->all();
        $new_post = new Post();
        $new_post->fill($form_data);
        // generazione slug
        $slug = Str::slug($new_post->title);
        //variabile che prende il valore dello slug e viene poi sovrascritta
        $slug_base = $slug;
        // verifica univocità dello slug
        $post_object_presente = Post::where('slug', $slug)->first();
        //cont
        $cont = 1;
        // se lo slug è presente parte il ciclo while
        while($post_object_presente) {
            // nuovo slug con contatore alla fine
            $slug = $slug_base . '-' . $cont;
            $cont++;
            $post_object_presente = Post::where('slug', $slug)->first();
        }

        // assegnazione slug al nuovo post
        $new_post->slug = $slug;
        $new_post->save();
        return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        if(!$post) {
            abort(404);
        }
        return view('admin.posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        if(!$post) {
            abort(404);
        }
        $data = [
            'post' => $post,
            'categories' => Category::all()
        ];
        return view('admin.posts.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $form_data = $request->all();
        // controlla se il titolo è stato modificato
        if($form_data['title'] != $post->title) {
            // se cambia il titolo deve cambiare anche lo slug

            // generazione slug
            $slug = Str::slug($form_data['title']);
            //assegno il valore di slug ad una variabile che poi verrà sovrascritta
            $slug_base = $slug;

            // controlli univocità slug ( se presente )
            $post_object_presente = Post::where('slug', $slug)->first();
            //contatore
            $cont = 1;
            // ciclo che si avvia quando $post_object_presente esiste
            while($post_object_presente) {
                // generazione nuovo slug con numero del contatore finale
                $slug = $slug_base . '-' . $cont;
                $cont++;
                $post_object_presente = Post::where('slug', $slug)->first();
            }

            // quando lo slug non è presente nel database, ne assegna il valore al campo slug
            $form_data['slug'] = $slug;
        }
        $post->update($form_data);
        return redirect()->route('admin.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index');
    }
}
