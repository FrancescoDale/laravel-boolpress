@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-capitalize text-center">elenco posts</h1>
        <ol>
            @foreach ($posts as $post)
                <li>
                    <a href="{{ route('posts.show', ['post' => $post->slug]) }}">
                        {{ $post->title }}
                        <small>  ------  {{ $post->slug }} </small>
                    </a>
                </li>
            @endforeach
        </ol>

    </div>
@endsection
