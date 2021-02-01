@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-capitalize"> {{ $category->name }} </h1>
                <ol>
                    @foreach ($category->posts as $post)
                        <li>
                            {{ $post->title }}
                        </li>
                    @endforeach
                </ol>
            </div>
        </div>
    </div>
@endsection
