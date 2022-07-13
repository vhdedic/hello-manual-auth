@extends('layouts.app')
@section('title', 'Edit')
@section('content')
<h1 class="my-4">Edit Post</h1>
    <div class="card">
        <div class="card-header">
            Update Post
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('posts.update', $post->id) }}">
                @method('PUT')
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" name="title" value="{{ $post->title }}">
                </div>
                <div class="mb-3">
                    <label for="body" class="form-label">Body</label>
                    <textarea class="form-control" name="body" rows="20">{{ $post->body }}</textarea>
                </div>
                <button type="submit" class="btn btn-outline-secondary">
                    Update
                </button>
                <a href="{{ route('posts.show', $post->id) }}" class="btn btn-outline-secondary">
                    Cancel
                </a>
            </form>
        </div>
    </div>
    <div class="card my-4">
        <div class="card-header">
            Delete Post
        </div>
        <div class="card-body">
            <p>Warning: This operation cannot be undone.</p>
            <form method="POST" action="{{ route('posts.destroy', $post->id) }}">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-outline-danger">
                    Delete
                </button>
            </form>
        </div>        
    </div>
@endsection
