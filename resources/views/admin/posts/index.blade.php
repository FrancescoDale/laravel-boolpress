@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="text-capitalize text-center">elenco posts</h1>
                <table class="table">
                    <thead>
                        <tr class="text-capitalize">
                            <td>id</td>
                            <td>title</td>
                            <td>slug</td>
                            <td>body</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{ $post->id}}</td>
                                <td>{{ $post->title}}</td>
                                <td>{{ $post->slug}}</td>
                                <td>{{ $post->body}}</td>
                                <td>
                                    <a class="btn btn-info text-capitalize" href="{{ route('admin.posts.show', ['post' => $post->id ]) }}">dettagli</a>
                                </td>
                                <td>
                                    <a class="btn btn-info text-capitalize" href="{{ route('admin.posts.edit', ['post' => $post->id]) }}">modifica</a>
                                </td>
                                <td>
                                    <form class="d-inline-block" action="{{ route('admin.posts.destroy', ['post' => $post->id]) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-primary text-capitalize"> elimina </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
        <div class="mt-4">
            <a href="{{ route('admin.posts.create') }}" class="text-capitalize btn btn-primary">inserisci post</a>
        </div>
    </div>
@endsection
