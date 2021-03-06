@extends('layouts.app')
@section('title', 'Edit Comment')
@section('content')
    <h1 class="my-4">Edit Comment</h1>
    <div class="card my-4">
        <div class="card-header">
            Update Comment
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('comments.update', $comment->id) }}">
                @method('PUT')
                @csrf
                <div class="mb-3">
                    <label for="body" class="form-label">Comment</label>
                    <textarea class="form-control" name="body" rows="20">{{ $comment->body }}</textarea>
                </div>
                <button type="submit" class="btn btn-outline-secondary">
                    Update
                </button>
                <a href="{{ route('posts.show', $comment->post_id) }}" class="btn btn-outline-secondary">
                    Cancel
                </a>
            </form>
        </div>
    </div>
    <div class="card my-4">
        <div class="card-header">
            Delete Comment
        </div>
        <div class="card-body">
            <p>Warning: This operation cannot be undone.</p>
            <form method="POST" action="{{ route('comments.destroy', $comment->id) }}">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-outline-danger">
                    Delete
                </button>
            </form>
        </div>
    </div>
@endsection
