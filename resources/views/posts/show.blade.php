@extends('layouts.app')
@section('title', 'Show Post')
@section('content')
    <h1 class="my-4">{{ $post->title }}</h1>
    <div>
        <span class="fw-bold">
            {{ $post->user->name }} - {{ $post->updated_at }}
        </span>
        <a href="{{ route('posts.edit', $post->id) }}" class="text-decoration-none">
            Edit
        </a>
    </div>
    <p class="my-4">{{ $post->body }}</p>
@endsection
