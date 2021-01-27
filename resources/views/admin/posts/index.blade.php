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
                            <td>azioni</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{ $post->title}}</td>
                                <td>{{ $post->slug}}</td>
                                <td>{{ $post->body}}</td>
                                <td>
                                    <a class="btn btn-info text-capitalize" href="#">dettagli</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>

    </div>

@endsection
