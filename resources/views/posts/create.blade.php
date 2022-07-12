@extends('layouts.app')
@section('title', 'Create New Post')
@section('content')
    <h1 class="my-4">Create New Post</h1>
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ url('posts/') }}">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" name="title">
                    @error('title')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="body" class="form-label">Body</label>
                    <textarea class="form-control" name="body" rows="20"></textarea>
                    @error('body')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-outline-secondary">Create</button>
            </form>
        </div>
    </div>
@endsection

