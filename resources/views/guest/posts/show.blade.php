@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-capitalize"> {{ $post->title }} </h1>
                <div class="">
                    {{ $post->body }}
                </div>
                <div class="mt-3">
                    <p>Categoria :
                        @if ($post->category)
                            <a href="{{ route('categories.show', ['slug' => $post->category->slug ]) }}">
                                {{ $post->category->name }}
                            </a>
                        @else
                            ---
                        @endif

                    </p>
                    <p>Tag :
                        @forelse ($post->tags as $tag)

                            {{ $tag->name }}{{ !$loop->last ? ',' : '.' }}

                        @empty
                            ---
                        @endforelse

                    </p>
                </div>

            </div>
        </div>
    </div>
@endsection
