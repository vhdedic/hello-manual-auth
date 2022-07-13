@extends('layouts.app')
@section('title', 'Show Post')
@section('content')
    <h1 class="my-4">{{ $post->title }}</h1>
    <div>
        <span class="fw-bold">
            {{ $post->user->name }} - {{ $post->updated_at }}
        </span>
        @if (auth()->check() && auth()->user()->id == $post->user_id)
            <a href="{{ route('posts.edit', $post->id) }}" class="text-decoration-none">
                edit
            </a>
        @endif
    </div>
    <p class="my-4">{{ $post->body }}</p>
@endsection
