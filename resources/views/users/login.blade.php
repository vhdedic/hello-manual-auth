@extends('layouts.app')
@section('title', 'Login')
@section('content')
    <h1 class="my-4">Login</h1>
<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ url('login') }}">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" name="email">
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password">
                @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-outline-secondary">Submit</button>
        </form>
  </div>
</div>
@endsection
