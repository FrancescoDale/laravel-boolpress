@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-capitalize"> {{ $post->title }} </h1>
                <div class="">
                    {{ $post->body }}
                </div>
            </div>
        </div>
    </div>
@endsection
