@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-capitalize text-center">elenco posts</h1>
        <ol>
            @foreach ($posts as $post)
                <li>
                    {{ $post->title }}
                </li>
            @endforeach
        </ol>

    </div>
@endsection
