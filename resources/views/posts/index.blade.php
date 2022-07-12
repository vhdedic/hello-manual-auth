@extends('layouts.app')
@section('title', 'Posts')
@section('content')
    <h1 class="my-4">Posts</h1>
    <hr />
    @foreach ($posts as $post)
        <div>
            <h2>
                <a href="{{ route('posts.show', $post->id) }}" class="text-decoration-none">
                    {{ $post->title }}
                </a>
            </h2>
            <span class="fw-bold">
                {{ $post->user->name }} - {{ $post->updated_at }}
            </span>
            <p>
                {{ Str::limit($post->body, 100) }}
            </p>
            <hr />
        </div>
    @endforeach
@endsection
