@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="card" style="width: 25rem;">
            <h2 class="text-center">{{ $post->title }}</h2>
            <img src="{{ $post->image_url }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5> {{ $post->user->name }}</h5>
                <p class="card-text">{{ $post->created_at->diffForHumans() }}</p>
                <div class="card-footer">
                    @if(!$post->approved)
                        <a href=""><button class="btn btn-success">Approve</button></a>
                    @endif
                    <a href=""><button class="btn btn-primary">Edit</button></a>
                    <a href=""><button class="btn btn-danger">Delete</button></a>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
