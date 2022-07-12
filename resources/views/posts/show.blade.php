@extends('layouts.app')
@section('title', 'Posts')
@section('content')
    <h1 class="my-4">{{ $post->title }}</h1>
    <div>
        <span class="fw-bold">
            {{ $post->user->name }} - {{ $post->updated_at }}
        </span>
    </div>
    <p class="my-4">{{ $post->body }}</p>
@endsection
