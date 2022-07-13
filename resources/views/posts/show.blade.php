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
    <h2 class="mb-4">Comments</h2>
    @if (count($comments) == 0)
        {{ 'No comments yet.' }}
    @else
        @foreach ($comments as $comment)
            <div class="card my-4 p-3">
                <span class="fw-bold">
                    {{ $comment->user->name }} - {{ $comment->updated_at }}
                </span>
                <p class="custom-ws my-4">{{ $comment->body }}</p>
            </div>
        @endforeach
    @endif
    <div class="card my-4">
        <div class="card-body">
            <form method="POST" action="{{ route('comments.store', $post->id) }}">
                @csrf
                <div class="mb-3">
                    <label for="body" class="form-label">Add comment</label>
                    <textarea class="form-control" name="body" rows="20" required></textarea>
                </div>
                <button type="submit" class="btn btn-outline-secondary" >
                    Add
                </button>
            </form>
        </div>
    </div>
@endsection
